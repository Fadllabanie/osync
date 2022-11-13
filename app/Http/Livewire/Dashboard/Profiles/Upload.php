<?php

namespace App\Http\Livewire\Dashboard\Profiles;

use App\Models\Admin;
use App\Models\Profile;
use App\Jobs\UploadProfiles;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use App\Imports\ProfilesImport;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Upload extends Component
{
    use WithFileUploads;
    use AuthorizesRequests;

    public $file;
    public $admin_id;
    protected $queryString = ['admin_id'];
  
    protected $rules = [ 
        // 'admin_id' => ['nullable','exists:admins,id'],
        'file' => 'required|mimes:xls,xlsx'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $this->authorize('create profiles');
        $validatedData = $this->validate();
        $file = $validatedData['file']; 
        $file = ($this->file) ? uploadToPublic('profiles', $validatedData['file']) : "";
        try{
            
            UploadProfiles::dispatch(public_path().'/'.$file);

            session()->flash('alert', __('Saved Successfully.'));
        }catch (\Maatwebsite\Excel\Validators\ValidationException $th) {

            foreach ($th->errors() as $key => $error) {
                // dd($error);
                session()->flash('error', $error);
            }
        }
        // UploadProfiles::dispatch(public_path().'/'.$file);
        // try{
        //     Excel::import(new ProfilesImport, $file);
        // }catch(\Exception $e){
        //     dd($e);
        // }
        $admin_id= $this->admin_id;
        $this->reset();
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
        return view('livewire.dashboard.profiles.upload');
    }
}
 