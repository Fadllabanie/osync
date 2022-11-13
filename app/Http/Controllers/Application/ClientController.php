<?php

namespace App\Http\Controllers\Application;

use App\Models\Card;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use App\Http\Services\ClientService;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\Web\Profile\CheckCodeRequest;

class ClientController extends Controller
{

    public function start()
    {
        return view('application.start');
    }
    public function check(CheckCodeRequest $request)
    {
        $card =  Card::where('token', $request->token)->where('code', $request->code)->firstOrFail();
        $profile = Profile::first();

        return view('application.create', compact('card', 'profile'));
    }

    // public function updateOrCreate(UpdateOrCreateProfileRequest $request)
    public function updateOrCreate(Request $request)
    {

        ClientService::updateOrCreate($request->all());

        Alert::success('SuccessAlert', 'Lorem ipsum dolor sit amet.');

        return redirect()->route('home.profile');
    }

    public function show()
    {
        $profile = Profile::where('id', 1)->first();
        $card =  Card::where('category_id', $profile->category_id)->firstOrFail();

        switch ($card->category_id) {
            case '1':
                return view('vCards.demo1', compact('profile'));
                break;
            case '2':
                return view('vCards.demo3', compact('profile'));
                break;
            case '3':
                return view('vCards.demo3', compact('profile'));
                break;
        }

        return view('vCards.demo3', compact('profile'));
    }

    public function displayProfile($token)
    {
        $card =  Card::where('token', $token)->firstOrFail();
        $profile = Profile::where('card_id', $card->id)->first();

        switch ($card->category_id) {
            case '1':
                return view('vCards.demo2', compact('profile'));
                break;
            case '2':
                return view('vCards.demo3', compact('profile'));
                break;
            case '3':
                return view('vCards.demo3', compact('profile'));
                break;
        }
    }
}
