<?php

namespace App\Http\Livewire\Dashboard\Industries;

use App\Models\Industry;
use Livewire\Component;
use Livewire\WithFileUploads;
// use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Store extends Component
{
    use WithFileUploads;
    // use AuthorizesRequests;

    public $name;
  
    protected $rules = [
        'name' => 'required|min:2|max:100'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        // $this->authorize('create industries');

        $validatedData = $this->validate();
         
        Industry::create($validatedData);

        $this->reset();

        session()->flash('alert', __('Saved Successfully.'));
        return redirect()->route('admin.industries.index');

    }

    public function resetForm()
    {
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
   
    public function render()
    {
        return view('livewire.dashboard.industries.store');
    }
} 
