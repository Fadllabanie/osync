<?php

namespace App\Http\Livewire\Dashboard\Admins;

use App\Models\Admin;
use App\Jobs\SendMail;
use App\Mail\Register;
use Livewire\Component;
use Auth;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Jobs\SendMailQueue;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class Store extends Component
{
    use WithFileUploads;
    use AuthorizesRequests;

    public $name;
    public $no_of_employees;
    public $email;
    public $password;
    public $password_confirmation;
    public $logo;
    public $admin_id;
    public $type;
    public $has_permission;
    protected $queryString = ['type'];

    // protected $rules = [
    //     'name' => 'required_if:'.$this->type.',=,admin','min:2','max:100',
    //     'no_of_employees' => 'nullable|numeric',
    //     'email' => 'required|string|email|max:255|unique:admins',
    //     'password' => 'required|string|min:8|confirmed',
    //     'logo' => 'nullable|mimes:jpeg,png,jpg,svg|max:2048',
    //     'admin_id' => 'nullable'
    // ];

   protected function rules()
    {
        if($this->type=="admin")
            return [
                'name' => ['required','min:2','max:100'],
                'no_of_employees' => 'nullable|numeric',
                'email' => 'required|string|email|max:255|unique:admins',
                'password' => 'required|string|min:8|confirmed',
                'logo' => 'nullable|mimes:jpeg,png,jpg,svg|max:2048',
                'admin_id' => 'nullable',
            ];
        elseif($this->type=="manager")
            return [
               'email' => 'required|string|email|max:255|unique:admins',
                'password' => 'required|string|min:8|confirmed',
                'logo' => 'nullable|mimes:jpeg,png,jpg,svg|max:2048',
                'admin_id' => 'nullable',
            ];
        else
            return [
                'name' => ['required','min:2','max:100'],
                'email' => 'required|string|email|max:255|unique:admins',
                'password' => 'required|string|min:8|confirmed',
                'has_permission' => 'nullable'
            ];

    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        if($this->type=="admin")
            $this->authorize('create admins');
        elseif($this->type=="manager")
            $this->authorize('create managers');
        else
            $this->authorize('create dashboard admins');
        

        $validatedData = $this->validate();

        if($this->type=="manager"){
            $validatedData['name'] = Admin::findOrFail($validatedData['admin_id'])->name;
        }

        $validatedData['logo'] = ($this->logo) ? uploadToPublic('admins', $validatedData['logo']) : "";
        $password = $validatedData['password'];
        $validatedData['password'] = Hash::make($validatedData['password']);

        $admin = Admin::create($validatedData);

         SendMail::dispatch($admin, $admin->email, $password);

        if($this->type=="admin")
            $admin->assignRole('corporate admin');
        elseif($this->type=="manager")
            $admin->assignRole('corporate manager');
        else{
            $admin->assignRole('dashboard admin');
            if(!isset($validatedData['has_permission']))
                $admin->revokePermissionTo(['access dashboard admins','create dashboard admins','edit dashboard admins','delete dashboard admins','activate dashboard admins']);
        }
        $type= $this->type;
        $this->reset();

        session()->flash('alert', __('Saved Successfully.'));
        return redirect()->route('admin.admins.index',['type'=>$type]);
    }

    public function resetForm()
    {
        $this->reset();
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function render()
    {
        if($this->type=="admin")
            return view('livewire.dashboard.admins.store');
        else{
            if(Auth::user()->hasRole('super admin'))
                return view('livewire.dashboard.admins.store',['admins'=> Admin::role('corporate admin')->get()]);
            else
                return view('livewire.dashboard.admins.store',['admin_id'=>Auth::user()->id]);

        }
    }
}
