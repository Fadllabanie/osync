<?php

namespace App\Http\Livewire\Dashboard\Industries;

use App\Models\Industry;
use Livewire\Component;
use Livewire\WithFileUploads;
// use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Update extends Component
{
    use WithFileUploads;
    // use AuthorizesRequests;

    public $industry;

    protected $rules = [
        'industry.name' => 'required|min:2|max:100'
    ]; 

    public function submit()
    {
        // $this->authorize('edit industries');

        $validatedData = $this->validate();

        $this->industry->save();

        session()->flash('alert', __('Update Successfully.'));

        return redirect()->route('admin.industries.index');
    }

    public function mount(Industry $industry)
    {
        $this->industry = $industry;
    }
    public function render()
    {
        return view('livewire.dashboard.industries.update');
    }
}
