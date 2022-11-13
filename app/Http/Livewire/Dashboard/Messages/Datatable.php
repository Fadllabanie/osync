<?php

namespace App\Http\Livewire\Dashboard\Messages;

use App\Models\Message;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

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
        // $this->authorize('delete messages');

        $this->emit('openDeleteModal'); // Open model to using to jquery
      
        $this->data_id = $id;
    }

    public function destroy()
    {
        $row = Message::findOrFail($this->data_id);
        $row->delete();

        $this->emit('closeDeleteModal'); // Close model to using to jquery
    }

    public function render()
    {
        return view('livewire.dashboard.messages.datatable',[
            'messages' => Message::orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->count),
        ]);
    }
}
