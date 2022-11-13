<?php

namespace App\Http\Livewire\Dashboard\Cards;

use App\Models\Card;
use Livewire\Component;
use App\Exports\CardsExport;
use Livewire\WithPagination;
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
    public $origin_id='all';
    public $subcategory_id='all';
    public $selected_cards=[];
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
        $this->authorize('delete cards');

        $this->emit('openDeleteModal'); // Open model to using to jquery
      
        $this->data_id = $id;
    }

    public function deleteAll()
    {
        $cards = $this->getCards()->delete();
    }

    public function exportExcel()
    {
        $cards = $this->getCards()->get();
        return Excel::download(new CardsExport($cards), 'cards.xlsx');
    }

    public function getCards(){
        $cards = Card::with('admin','category','subcategory','origin')
            ->when('subcategory_id', function ($q) {
                if ($this->subcategory_id != 'all') {
                    $q->where('subcategory_id', $this->subcategory_id);
                }
            })->when('origin_id', function ($q) {
                if ($this->origin_id != 'all') {
                    $q->where('origin_id', $this->origin_id);
                }
            })
            ->when('admin_id', function ($q) {
                if ($this->admin_id == 'consumers') {
                    $q->whereNull('admin_id');
                }
                elseif ($this->admin_id != 'all') {
                    $q->where('admin_id', $this->admin_id);
                }
            })->when(count($this->selected_cards)>0, function ($q) {
                $q->whereIn('id', $this->selected_cards);
            });
        return $cards;
    }

    public function exportQrcodes()
    {
        Storage::disk('public')->deleteDirectory('images/qrcodes');
        Storage::disk('public')->delete('images/qrcodes.zip');
        
        $cards = $this->getCards()->get();
        foreach($cards as $card){
            $image = \QrCode::format('png')->size(500)
            ->generate($card->token);
            Storage::disk('public')->put('images/qrcodes/'.$card->id.'.png', $image); 
        }
        $files = glob(storage_path('app/public/images/qrcodes/*'));
        zip($files, 'qrcodes.zip');
        return response()->download(storage_path("app/public/images/qrcodes.zip"));
    }

    public function destroy()
    {
        $row = Card::findOrFail($this->data_id);
        $row->delete();

        $this->emit('closeDeleteModal'); // Close model to using to jquery
    }

    public function render()
    {
        // dd($this->queryString);
        $this->resetPage();
        return view('livewire.dashboard.cards.datatable',[
            'cards' => Card::with('admin','category','subcategory','origin')
            ->when('subcategory_id', function ($q) {
                if ($this->subcategory_id != 'all') {
                    $q->where('subcategory_id', $this->subcategory_id);
                }
            })->when('origin_id', function ($q) {
                if ($this->origin_id != 'all') {
                    $q->where('origin_id', $this->origin_id);
                }
            })
            ->when('admin_id', function ($q) {
                if ($this->admin_id == 'consumers') {
                    $q->whereNull('admin_id');
                }
                elseif ($this->admin_id == 'all') {
                    $q->whereNotNull('admin_id');
                }
                elseif ($this->admin_id != 'all'  ) {
                    $q->where('admin_id', $this->admin_id);
                }
            })
            ->when('search', function ($q){
                $q->where(function ($q2) {
                    $q2->search('token', $this->search);
                    $q2->orSearch('id', $this->search);
                });
            })
            ->when(Auth::user()->hasRole('corporate admin'), function ($q) {
                $q->where('admin_id', Auth::user()->id);
            })->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->count),
        ]);
    }
}
