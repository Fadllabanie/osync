<?php

namespace App\Http\Controllers\Client;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\ClientService;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\Web\Profile\UpdateOrCreateProfileRequest;

class HomeController extends Controller
{

    public function index()
    {
        $profile = Profile::where('id', 1)->first();

        return view('users.profile', compact('profile'));
    }

    // public function updateOrCreate(UpdateOrCreateProfileRequest $request)
    public function updateOrCreate(Request $request)
    {
        ClientService::updateOrCreate($request->all());

        Alert::success('SuccessAlert', 'Lorem ipsum dolor sit amet.');

        return redirect()->route('home.profile');
    }
}
