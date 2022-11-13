<?php

namespace App\Http\Livewire\Dashboard\Profiles;

use App\Models\Profile;
use App\Models\Industry;
use App\Models\Admin;
use Livewire\Component;
use Webpatser\Uuid\Uuid;
use Livewire\WithFileUploads;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Update extends Component
{
    use WithFileUploads;
    use AuthorizesRequests;

    public $admin_id;
    public $industrie_id;
    public $gender;
    public $profile;

    protected $rules = [
        'industrie_id' => ['required','exists:industries,id'],
        'admin_id' => ['nullable','exists:admins,id'],
        'profile.prefix' => ['nullable','max:100'],
        'profile.first_name' => ['required', 'min:2', 'max:100'],
        'profile.middle_name' => ['nullable', 'min:2', 'max:100'],
        'profile.last_name' => ['required', 'min:2', 'max:100'],
        'profile.nike_name' => ['nullable', 'min:2', 'max:100'],
        'profile.email' => ['required', 'email'],
        'gender' => ['required', 'in:1,2,3'],
        'profile.birthday' => ['required', 'date'],
        'profile.mobile' => ['required'],
        'profile.organization' => ['nullable'],
        'profile.organization_url' => ['nullable'],
        'profile.organization_address' => ['nullable'],
        'profile.role' => ['nullable'],
        'profile.fax' => ['nullable'],
        'profile.work_mobile' => ['nullable'],
        'profile.work_email' => ['nullable'],
        'profile.work_phone' => ['nullable'],
        'profile.home_phone' => ['nullable']
    ]; 


    public function submit()
    {
        $this->authorize('edit profiles');

        $validatedData = $this->validate();
        $this->profile['admin_id'] = $validatedData['admin_id'];
        $this->profile['industrie_id'] = $validatedData['industrie_id'];
        $this->profile['gender'] = $validatedData['gender'];
        $this->profile->save();

        session()->flash('alert', __('Update Successfully.'));

        return redirect()->route('admin.profiles.index');
    }

    public function mount(Profile $profile)
    {
        $this->profile = $profile;
        $this->industrie_id = $profile->industrie_id;
        $this->admin_id = $profile->admin_id;
        $this->gender = $profile->gender;
    }
    public function render()
    {
        return view('livewire.dashboard.profiles.update',[
            'industries' => Industry::get(),
            'admins' => Admin::role('corporate admin')->get()
        ]);
    }
}
