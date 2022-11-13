<?php

namespace App\Http\Livewire\Dashboard\Profiles;

use App\Models\Profile;
use Livewire\Component;
use Livewire\WithPagination;
use App\Exports\ProfilesExport;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Datatable extends Component
{
    use WithPagination;
    use AuthorizesRequests;

    protected $paginationTheme = 'bootstrap';
    public $search;
    public $data_id;
    public $is_active='all';
    public $industrie_id='all';
    public $selected_profiles=[];
    public $admin_id='all';
    public $count = 20;
    public $sortBy = 'created_at';
    public $sortDirection = 'DESC';
    protected $queryString = ['admin_id'];

    public function sortBy($field)
    {
        if ($this->sortDirection == 'asc') {
            $this->sortDirection = 'desc';
        } else {
            $this->sortDirection = 'asc';
        }
        return $this->sortBy = $field;
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function confirm($id)
    {
        $this->authorize('delete profiles');

        $this->emit('openDeleteModal'); // Open model to using to jquery
      
        $this->data_id = $id;
    }

    public function destroy()
    {
        $row = Profile::findOrFail($this->data_id);
        $row->delete();

        $this->emit('closeDeleteModal'); // Close model to using to jquery
    }

    public function deleteAll()
    {
        $profiles = $this->getProfiles()->delete();
    }

    public function exportExcel()
    {
        $profiles = $this->getProfiles()->get();
        return Excel::download(new ProfilesExport($profiles), 'profiles.xlsx');
    }

    public function getProfiles(){
        $profiles = Profile::with('admin','industrie')
            ->when('industrie_id', function ($q) {
                if ($this->industrie_id != 'all') {
                    $q->where('industrie_id', $this->industrie_id);
                }
            })
            ->when('admin_id', function ($q) {
                if($this->admin_id == 'consumers')
                    $q->whereNull('admin_id');
                elseif ($this->admin_id != 'all') {
                    $q->where('admin_id', $this->admin_id);
                }

            })
            ->when(Auth::user()->hasRole('corporate admin'), function ($q) {
                $q->where('admin_id', Auth::user()->id);
            })
            ->when(count($this->selected_profiles)>0, function ($q) {
                $q->whereIn('id', $this->selected_profiles);
            })
            ->where(function ($q) {
                $q->search('first_name', $this->search);
                $q->orSearch('middle_name', $this->search);
                $q->orSearch('last_name', $this->search);
            });
        return $profiles;
    }

    public function render()
    {
        return view('livewire.dashboard.profiles.datatable',[
            'profiles' => Profile::with('admin','industrie','category')
            ->when('industrie_id', function ($q) {
                if ($this->industrie_id != 'all') {
                    $q->where('industrie_id', $this->industrie_id);
                }
            })
            ->when('admin_id', function ($q) {
                if($this->admin_id == 'consumers')
                    $q->whereNull('admin_id');
                elseif ($this->admin_id != 'all') {
                    $q->where('admin_id', $this->admin_id);
                }

            })
            ->when(Auth::user()->hasRole('corporate admin'), function ($q) {
                $q->where('admin_id', Auth::user()->id);
            })
            ->where(function ($q) {
                $q->search('first_name', $this->search);
                $q->orSearch('middle_name', $this->search);
                $q->orSearch('last_name', $this->search);
            })->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->count),
        ]);
    }
}
