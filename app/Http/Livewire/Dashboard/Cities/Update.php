<?php

namespace App\Http\Livewire\Dashboard\Cities;

use App\Models\City;
use App\Models\Country;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Update extends Component
{
    use WithFileUploads;
    use AuthorizesRequests;

    public $city;

    protected $rules = [
        'city.ar_name' => 'required|min:2|max:100',
        'city.en_name' => 'required|min:2|max:100',
        'city.country_id' => 'required',
        'city.status' => 'required',
    ];

    public function submit()
    {
        $this->authorize('edit cities');

        $validatedData = $this->validate();

        $this->city->save();
        
        session()->flash('alert', __('Update Successfully.'));

        return redirect()->route('admin.cities.index');
    }

    public function mount(City $city)
    {
        $this->city = $city;
    }
    public function render()
    {
        return view('livewire.dashboard.cities.update', [
            'countries' => Country::get(),
        ]);
    }
}
