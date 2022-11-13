<?php

namespace App\Http\Livewire\Dashboard\Profiles;

use App\Models\Admin;
use App\Models\Profile;
use Livewire\Component;
use App\Models\Industry;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Store extends Component
{
    use WithFileUploads;
    use AuthorizesRequests;

    public $industrie_id, $admin_id, $prefix, $first_name, $middle_name;
    public $last_name, $nike_name, $email, $gender, $birthday, $mobile;
    public $organization, $organization_url, $organization_address;
    public $role, $fax, $work_mobile, $work_email, $home_phone;
    public $work_phone;
    protected $queryString = ['admin_id'];
  
    protected $rules = [ 
        'industrie_id' => ['required','exists:industries,id'],
        'admin_id' => ['nullable','exists:admins,id'],
        'prefix' => ['nullable','max:100'],
        'first_name' => ['required', 'min:2', 'max:100'],
        'middle_name' => ['nullable', 'min:2', 'max:100'],
        'last_name' => ['required', 'min:2', 'max:100'],
        'nike_name' => ['nullable', 'min:2', 'max:100'],
        'email' => ['required', 'email'],
        'gender' => ['required', 'in:1,2,3'],
        'birthday' => ['required', 'date'],
        'mobile' => ['required'],
        'organization' => ['nullable'],
        'organization_url' => ['nullable'],
        'organization_address' => ['nullable'],
        'role' => ['nullable'],
        'fax' => ['nullable'],
        'work_mobile' => ['nullable'],
        'work_email' => ['nullable'],
        'work_phone' => ['nullable'],
        'home_phone' => ['nullable']
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $this->authorize('create profiles');

        $validatedData = $this->validate();
        $validatedData['code'] = generateRandomCode('PRF');
        $validatedData['status'] = true;
        if(Auth::user()->hasRole('corporate admin'))
            $validatedData['admin_id'] = Auth::user()->id;
        if(Auth::user()->hasRole('corporate manager'))
            $validatedData['admin_id'] = Auth::user()->admin_id;
        $profile= Profile::create($validatedData);
        $admin_id= $this->admin_id;
        $this->reset();

        session()->flash('alert', __('Saved Successfully.'));
        return redirect()->route('admin.profiles.index',['admin_id'=>$admin_id]);

    }

    public function resetForm()
    {
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }
   
    public function render()
    {
        return view('livewire.dashboard.profiles.store',[
            'industries' => Industry::get(),
            'admins' => Admin::role('corporate admin')->get(),
        ]);
    }
}
 