<?php

namespace App\Http\Livewire\Dashboard\Cards;

use App\Models\Card;
use App\Models\Admin;
use App\Models\Origin;
use Livewire\Component;
use App\Models\Category;
use App\Models\Subcategory;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Store extends Component
{
    use WithFileUploads;
    use AuthorizesRequests;

    public $count;
    public $origin_id;
    public $admin_id;
    public $category_id;
    public $subcategory_id;
    protected $queryString = ['admin_id'];

    protected $rules = [
        'count' => 'required|numeric',
        'admin_id' => 'nullable|exists:admins,id',
        'origin_id' => 'required|exists:origins,id',
        'subcategory_id' => 'required|exists:subcategories,id'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $this->authorize('create cards');

        $validatedData = $this->validate();


        $subcategory = Subcategory::where('id', $validatedData['subcategory_id'])->first();

        $category = $subcategory->category;

        $origin = Origin::where('id', $validatedData['origin_id'])->first();

        $validatedData['category_id'] = $category->id;

        $admin_code = '';

        if (Auth::user()->hasRole('corporate admin'))
            $validatedData['admin_id'] = Auth::user()->id;
        if (Auth::user()->hasRole('corporate manager'))
            $validatedData['admin_id'] = Auth::user()->admin_id;

        if ($validatedData['admin_id']) {
            $admin = Admin::where('id', $validatedData['admin_id'])->first();
            $admin_code = substr($admin->name, 0, 2) . "_";
        }

        $i = 0;
        while ($i < $validatedData['count']) {
            $i++;
            $validatedData['token'] = generateToke($admin_code, $category->name, $subcategory->name, $origin->code);
            Card::create($validatedData);
        }
        $admin_id = $this->admin_id;
        $this->reset();

        session()->flash('alert', __('Saved Successfully.'));
        return redirect()->route('admin.cards.index', ['admin_id' => $admin_id]);
    }

    public function resetForm()
    {
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function render()
    {
        return view('livewire.dashboard.cards.store', [
            'categories' => Category::with('subcategories')->get(),
            'origins' => Origin::get(),
            'admins' => Admin::role('corporate admin')->get(),
        ]);
    }
}
