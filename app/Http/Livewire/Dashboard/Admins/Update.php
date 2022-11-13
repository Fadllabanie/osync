<?php

namespace App\Http\Livewire\Dashboard\Admins;

use App\Models\Admin;
use Livewire\Component;
use Livewire\WithFileUploads;
// use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Update extends Component
{
    use WithFileUploads;
    // use AuthorizesRequests;

    public $admin;
    public $logo;
    public $has_permission;

    protected $rules = [
        'admin.name' => 'required|min:2|max:100',
        'admin.no_of_employees' => 'nullable|numeric',
        'logo' => 'nullable',
        'has_permission' => 'nullable'
    ]; 

    public function updatedIcon()
    {
        $this->validate([
            'logo' => 'image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);
    }

    public function submit()
    {
        // $this->authorize('edit admins');

        $validatedData = $this->validate();

        $this->admin->save();

        if ($this->logo) {
            $this->admin->update([
                'logo' => uploadToPublic('admins', $validatedData['logo']),
            ]);
        }
        if($admin->role('dashboard admin')){
            if(!isset($validatedData['has_permission']) && $admin->hasPermissionTo('access dashboard admins'))
                $admin->revokePermissionTo(['access dashboard admins','create dashboard admins','edit dashboard admins','delete dashboard admins','activate dashboard admins']);
            if(isset($validatedData['has_permission']) && !$admin->hasPermissionTo('access dashboard admins'))
                $admin->givePermissionTo(['access dashboard admins','create dashboard admins','edit dashboard admins','delete dashboard admins','activate dashboard admins']);    
        }
        

        session()->flash('alert', __('Update Successfully.'));

        return redirect()->route('admin.admins.index');
    }

    public function mount(Admin $admin)
    {
        $this->admin = $admin;
    }
    public function render()
    {
        return view('livewire.dashboard.admins.update');
    }
}
