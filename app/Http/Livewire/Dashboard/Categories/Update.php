<?php

namespace App\Http\Livewire\Dashboard\Categories;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithFileUploads;
// use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Update extends Component
{
    use WithFileUploads;
    // use AuthorizesRequests;

    public $category;
    public $icon;

    protected $rules = [
        'category.name' => 'required|min:2|max:100',
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
        // $this->authorize('edit categories');

        $validatedData = $this->validate();

        $this->category->save();

        if ($this->icon) {
            $this->category->update([
                'icon' => uploadToPublic('categories', $validatedData['icon']),
            ]);
        }
        session()->flash('alert', __('Update Successfully.'));

        return redirect()->route('admin.categories.index');
    }

    public function mount(Category $category)
    {
        $this->category = $category;
    }
    public function render()
    {
        return view('livewire.dashboard.categories.update');
    }
}
