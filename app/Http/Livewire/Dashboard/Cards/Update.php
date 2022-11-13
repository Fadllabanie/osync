<?php

namespace App\Http\Livewire\Dashboard\Cards;

use App\Models\Card;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Origin;
use App\Models\Admin;
use Livewire\Component;
use Webpatser\Uuid\Uuid;
use Livewire\WithFileUploads;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Update extends Component
{
    use WithFileUploads;
    use AuthorizesRequests;

    public $subcategory;
    public $icon;
    public $country_id;
    public $card;

    protected $rules = [
        'admin_id'=> 'nullable',
        'origin_id'=> 'required|exists:origins,id',
        'subcategory_id'=> 'required|exists:subcategories,id'
    ]; 


    public function submit()
    {
        $this->authorize('edit cards');

        $validatedData = $this->validate();
        $subcategory = Subcategory::where('id',$validatedData['subcategory_id'])->first();
        $category = $subcategory->category;
        $origin = Origin::where('id',$validatedData['origin_id'])->first();
        $admin_code = '';
        if($validatedData['admin_id'] && $validatedData['admin_id'] !="Select..."){
            $admin = Admin::where('id',$validatedData['admin_id'])->first();
            $admin_code = substr($admin->name,0,2)."_";
        }else
            $validatedData['admin_id'] = null;

        $this->card['category_id'] = $category->id;
        $this->card['subcategory_id'] = $validatedData['subcategory_id'];
        $this->card['admin_id'] = $validatedData['admin_id'];
        $this->card['origin_id'] = $validatedData['origin_id'];
        $validatedData['token'] = generateToke($admin_code, $category->name, $subcategory->name, $origin->code);
        $this->card->save();

        session()->flash('alert', __('Update Successfully.'));

        return redirect()->route('admin.cards.index');
    }

    public function mount(Card $card)
    {
        $this->card = $card;
        $this->subcategory_id = $card->subcategory_id;
        $this->origin_id = $card->origin_id;
        $this->admin_id = $card->admin_id;
    }
    public function render()
    {
        return view('livewire.dashboard.cards.update',[
            'categories' => Category::with('subcategories')->get(),
            'origins' => Origin::get(),
            'admins' => Admin::role('corporate admin')->get()
        ]);
    }
}
