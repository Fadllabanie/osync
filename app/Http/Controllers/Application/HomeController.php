<?php

namespace App\Http\Controllers\Application;

use App\Models\User;
use App\Models\Message;
use App\Models\Profile;
use App\Models\Newscaster;
use App\Mail\NewClientMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\Api\Users\Profiles\StoreRequest;
use App\Http\Requests\Api\Users\Profiles\StoreRequestWeb;

class HomeController extends Controller
{

    public function index()
    {
        return view('welcome');
    }

    public function kk()
    {
        return view('kk');
    }

    public function contact(Request $request)
    {
        Message::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'code' => '$request->title',
            'title' => '$request->title',
            'message' => $request->message,
        ]);

        $code = '4444';

        Mail::to($request->email)->send(new NewClientMail($this->name, $code));

        return redirect()->route('home');
    }

    public function news(Request $request)
    {
        Newscaster::create([
            'email' => $request->email,
        ]);

        return redirect()->route('home');
    }
    public function show($code)
    {

        $user = User::with('profiles')->where('code', $code)->first();

        return view('vCards.demo3', compact('user'));
    }
    public function edit($code)
    {

        $user = User::with('profiles')->where('code', $code)->first();
        // dd($user->profiles->first());
        return view('vCards.create', compact('user'));
    }

    public function update(StoreRequestWeb $request)
    {

        //   dd($request->all());
        $request['code'] = generateRandomCode('PRF');
        $request['status'] = true;

        $user = User::create([
            'full_name' => $request->first_name,
            'code' => generateRandomCode('USR'),
            'mobile' => $request->mobile,
            'country_id' => 1,
            'city_id' => 1,
            'email' => $request->email,
            'status' => true,
            'avatar' => upload($request->avatar, 'avatars'),

        ]);
        $profile = Profile::create([
            'prefix' => $request->prefix,
            'first_name' => $request->first_name,
            'nike_name' => $request->nike_name,
            'last_name' => $request->last_name,
            'middle_name' => $request->middle_name,
            'work_mobile' => $request->work_mobile,
            'work_email' => $request->work_email,
            'role' => $request->role,
            'organization_address' => $request->organization_address,
            'organization_url' => $request->organization_url,
            'organization' => $request->organization,
            // 'avatar' => upload($request->avatar, 'avatars'),
            'mobile' => $request->mobile,
            'email' => $request->email,
            'gender' => $request->gender,
            'birthday' => $request->birthday,
            'code' => $request->code,
            'user_id' => $user->id,
            'status' => $request->status,

        ]);

        if ($request->has('links_name') && $request->has('links_url')) {
            if ($request->links_name[0] != null or $request->links_url[0] != null) {
                foreach ($request->links_name as $name) {
                    DB::table('profile_links')->insert([
                        'profile_id' => $profile->id,
                        'name' => $name,
                        'created_at' => now(),
                    ]);
                }
                foreach ($request->links_url as $url) {
                    DB::table('profile_links')->where('profile_id', $profile->id)->update([
                        'url' => $url,
                        'updated_at' => now(),
                    ]);
                }
            }
        }

        return $profile;
    }
}
