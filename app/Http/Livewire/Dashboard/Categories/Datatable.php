<?php

namespace App\Http\Livewire\Dashboard\Categories;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class Datatable extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search;
    public $data_id;
    public $count = 20;
    public $sortBy = 'created_at';
    public $sortDirection = 'DESC';

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
        // $this->authorize('delete categories');

        $this->emit('openDeleteModal'); // Open model to using to jquery
      
        $this->data_id = $id;
    }

    public function destroy()
    {
        $row = Category::findOrFail($this->data_id);
        $row->delete();

        $this->emit('closeDeleteModal'); // Close model to using to jquery
    }

    public function render()
    {
        return view('livewire.dashboard.categories.datatable',[
            'categories' => Category::orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->count),
        ]);
    }
}
