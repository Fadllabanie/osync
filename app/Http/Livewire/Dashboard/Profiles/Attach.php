<?php

namespace App\Http\Livewire\Dashboard\Profiles;

use App\Models\Profile;
use App\Models\Admin;
use App\Models\Card;
use Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Attach extends Component
{
    use WithFileUploads;
    use AuthorizesRequests;

    public $token;
    public $profile;
    // public $cards; 
    public $data_id;

    protected function rules()
    {
        return [
            'token' => ['required','exists:cards,token', 
            Rule::exists('cards', 'token')->when(Auth::user()->hasRole('corporate admin'), function ($q) {
                $q->where('admin_id', Auth::user()->id);
            })],
        ];

    }
    public function submit()
    {
        $this->authorize('edit profiles');

        $validatedData = $this->validate();
        $card = Card::where('token', $validatedData['token'])->first();
        $this->profile->cards()->attach($card);

        session()->flash('alert', __('Card attached Successfully.'));

        return redirect()->route('admin.profiles.attach',['profile'=>$this->profile->id]);
    }

    public function confirm($id)
    {
        $this->authorize('delete profiles');

        $this->emit('openDeleteModal'); // Open model to using to jquery
      
        $this->data_id = $id;
    }

    public function destroy()
    {
        $row = $this->profile->cards()->detach($this->data_id);
        // $row->delete();

        $this->emit('closeDeleteModal'); // Close model to using to jquery
    }

    public function mount(Profile $profile)
    {
        $this->profile = $profile;
        // $this->profile->cards = Card::whereHas('profiles', function($q) use($profile){
        //     $q->where('profile_id',$profile->id);
        // })->get();
        // dd($this->cards);
    }
    public function render()
    {
        return view('livewire.dashboard.profiles.attach',[
            'cards' => Card::with('admin','category','subcategory','origin')->whereHas('profiles', function($q){
                $q->where('profile_id',$this->profile->id);
            })->get()
        ]);
    }
}
