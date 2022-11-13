<?php

namespace App\Http\Livewire\Dashboard\Subcategories;

use App\Models\Subcategory;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Update extends Component
{
    use WithFileUploads;
    use AuthorizesRequests;

    public $subcategory;
    public $icon;
    public $country_id;

    protected $rules = [
        'subcategory.name' => 'required|min:2|max:100',
        'category_id' => 'required|exists:categories,id',
        'icon' => 'nullable',
    ]; 

    public function updatedIcon()
    {
        $this->validate([
            'icon' => 'image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);
    }

    public function submit()
    {
        $this->authorize('edit categories');

        $validatedData = $this->validate();
        $this->subcategory['category_id'] = $validatedData['category_id'];
        //dd($validatedData['category_id']);
        $this->subcategory->save();

        if ($this->icon) {
            $this->subcategory->update([
               'icon' => uploadToPublic('subcategories', $validatedData['icon']),
            ]);
        }
        session()->flash('alert', __('Update Successfully.'));

        return redirect()->route('admin.subcategories.index');
    }

    public function mount(Subcategory $subcategory)
    {
        $this->subcategory = $subcategory;
        $this->category_id = $subcategory->category_id;
    }
    public function render()
    {
        return view('livewire.dashboard.subcategories.update',[
            'categories' => Category::get(),
        ]);
    }
}
