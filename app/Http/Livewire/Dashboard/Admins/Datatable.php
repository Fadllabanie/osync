<?php

namespace App\Http\Livewire\Dashboard\Admins;

use App\Models\Admin;
use Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Datatable extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search;
    public $data_id;
    public $type;
    public $is_active='all';
    public $count = 20;
    public $sortBy = 'created_at';
    public $sortDirection = 'DESC';
    protected $queryString = ['type'];

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
        // $this->authorize('delete admins');

        $this->emit('openDeleteModal'); // Open model to using to jquery
      
        $this->data_id = $id;
    }

    public function destroy()
    {
        $row = Admin::findOrFail($this->data_id);
        $row->delete();

        $this->emit('closeDeleteModal'); // Close model to using to jquery
    }
    public function activate($admin_id)
    {
        Admin::whereId($admin_id)->update([
            'is_active' => true,
        ]);
      
        session()->flash('alert', __('Admin Activated Successfully.'));
    }
    
   public function deactivate($admin_id)
    {
        Admin::whereId($admin_id)->update([
            'is_active' => false,
        ]);
      
        session()->flash('alert', __('Admin Deactivated Successfully.'));
    }
    public function render()
    {
        return view('livewire.dashboard.admins.datatable',[
            'admins' => Admin::when('type', function ($q) {
                
                if ($this->type == 'manager') {
                    $q->role('corporate manager');
                    if(Auth::user()->hasRole('corporate admin'))
                        $q->where('admin_id',Auth::user()->id);
                }elseif($this->type == 'admin'){
                    $q->role('corporate admin');
                }
                else{
                    $q->role('dashboard admin');
                }
            })->with('roles','cards','profiles')->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->count),
        ]);
    }
}
