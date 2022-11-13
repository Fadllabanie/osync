<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\Register;
use App\Http\Requests\StoreProfileRequest;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        

        $client = new \GuzzleHttp\Client();
        if($request['type']=="users"){
            $page_title = 'Users List';
            $url='http://164.90.182.14/api/user/list-users';
            $getTitles = $client->request('GET', $url);
            $users = json_decode($getTitles->getBody(), true); 
            // dd($users);
            return view('dashboard.client.indexUsers', compact('page_title', 'users'));
        }else{
            $page_title = 'Profiles List';
            $url='http://164.90.182.14/api/user/list-profiles';
            $getTitles = $client->request('GET', $url);
            $users = json_decode($getTitles->getBody(), true); 
            // dd($users);
            return view('dashboard.client.index', compact('page_title', 'users'));
        }
        
    }

    

    public function getTitles()
    {
        $client = new \GuzzleHttp\Client();
        $url='http://164.90.182.14/api/user/titles';
        $getTitles = $client->request('GET', $url);
        $getTitlesResponse = json_decode($getTitles->getBody(), true);       
        return $getTitlesResponse;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $titles = $this->getTitles();       
        $page_title = 'Add New Profile';
        return view('dashboard.client.create', compact('page_title','titles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProfileRequest $request)
    {

        $data = $request->validated();
        $data['nickname'] = ['nickname'=>$request['nickname'], 'visible'=>true];
        $data['birth_day'] = ['birth_day'=>$request['birth_day'], 'visible'=>true];
        $data['home_number'] = ['home_number'=>$request['home_number'], 'visible'=>true];
        $data['gender'] = ['gender'=>$request['gender'], 'visible'=>true];
        $data['personal_email'] = ['personal_email'=>$request['personal_email'], 'visible'=>true];
        $data['organization'] = ['organization'=>$request['organization'], 'visible'=>true];
        $data['role'] = ['role'=>$request['role'], 'visible'=>true];
        $data['work_url'] = ['work_url'=>$request['work_url'], 'visible'=>true];
        $data['work_email'] = ['work_email'=>$request['work_email'], 'visible'=>true];
        $data['work_phone'] = ['work_phone'=>$request['work_phone'], 'visible'=>true];
        $data['fax'] = ['fax'=>$request['fax'], 'visible'=>true];
        $data['address'] = ['address'=>$request['address'], 'visible'=>true];
        // dd($data);
        $data['links'] = [];
        foreach($request['links'] as $link){
            $data['links'][$link['name']] = $link['value'];
        } 

        $client = new \GuzzleHttp\Client();
        $url = 'http://164.90.182.14/api/user/admin-create-profile';
        try{
            $result = $client->request('POST', $url , [
            'json' => $data
            ]);
            $response = json_decode($result->getBody(), true);
            return redirect('/user')->with('status', 'User created successfully!');
        }catch(\Exception $e){
            return redirect('/user')->with('status', 'Error occured!');
        }
    
        
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $page_title = 'Show User';
       
        return view('dashboard.admin.show', compact('page_title', 'admin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $admin)
    {
        $page_title = 'Update Corporate Admin';
        return view('dashboard.user.edit', compact('page_title', 'admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,User $admin)
    {
        $request->validate([
            'name' => 'required',
            'logo' => 'nullable|image',
        ]);

        $dir_name = 'admin';
        $data = $request->all();
        if ($request->hasFile('logo')) {
            Storage::disk('public')->delete($admin->logo);
            $file_name = now()->format('Y_m_d_His') . '.' . $request->logo->extension();
            $data['logo'] = $request->logo->storeAs('images/' . $dir_name, $file_name, 'public');
        };

        $admin->update($data);
        return redirect('/admin')->with('status', 'Admin edited successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $admin)
    {
        $message= "";
        if($admin->is_active)
            $admin->is_active = 0;
        else
            $admin->is_active = 1;
        
        $admin->save();

        return response()->json([ 'user'=>$admin]);
            
    }
}
