<?php

namespace App\Http\Livewire\Dashboard\Categories;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithFileUploads;
// use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Store extends Component
{
    use WithFileUploads;
    // use AuthorizesRequests;

    public $name;
    public $icon;
  
    protected $rules = [
        'name' => 'required|min:2|max:100',
        'icon' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        // $this->authorize('create categories');

        $validatedData = $this->validate();

        $validatedData['icon'] = ($this->icon) ? uploadToPublic('categories', $validatedData['icon']) : "";
         
        Category::create($validatedData);

        $this->reset();

        session()->flash('alert', __('Saved Successfully.'));
        return redirect()->route('admin.categories.index');

    }

    public function resetForm()
    {
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
   
    public function render()
    {
        return view('livewire.dashboard.categories.store');
    }
}
 