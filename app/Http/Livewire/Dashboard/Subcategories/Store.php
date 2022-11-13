<?php

namespace App\Http\Livewire\Dashboard\Subcategories;

use App\Models\Category;
use App\Models\Subcategory;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Store extends Component
{
    use WithFileUploads;
    use AuthorizesRequests;

    public $name;
    public $icon;
    public $category_id;
  
    protected $rules = [
        'name' => 'required|min:2|max:100',
        'category_id' => 'required|exists:categories,id',
        'icon' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $this->authorize('create categories');

        $validatedData = $this->validate();

        $validatedData['icon'] = ($this->icon) ? uploadToPublic('subcategories', $validatedData['icon']) : "";
         
        Subcategory::create($validatedData);

        $this->reset();

        session()->flash('alert', __('Saved Successfully.'));
        return redirect()->route('admin.subcategories.index');

    }

    public function resetForm()
    {
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
   
    public function render()
    {
        return view('livewire.dashboard.subcategories.store',[
            'categories' => Category::get(),
        ]);
    }
}
 