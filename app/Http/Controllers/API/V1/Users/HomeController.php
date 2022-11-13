<?php

namespace App\Http\Controllers\API\V1\Users;

use App\Models\Card;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Users\UserTinyResource;
use App\Http\Resources\Users\UserLargeResource;
use App\Http\Requests\Api\Users\Auth\RegisterRequest;
use App\Http\Requests\Api\Users\Auth\UpdateUserDetailsRequest;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tinyProfile()
    {
        return $this->respondWithItem(new UserTinyResource(Auth::user()));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkType(Request $request)
    {
        $card = Card::where('token', $request->card_token)->first();

        if (!$card) return $this->errorStatus();
        if ($card) return $this->successStatus();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function largeProfile(Request $request)
    {

        $user = User::with(
            'profiles',
            'enableProfiles',
            'profiles.links',
            'profiles.portfolios',
            'profiles.industrie'
        )->find($request->user_id);

        return $this->respondWithItem(new UserLargeResource($user));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateMedia(Request $request)
    {
        if ((int)$request->type != User::COVER && $request->type != User::AVATAR) return $this->errorStatus(__("type is wrongs"));

        if ((int)$request->type == User::COVER) {
            User::whereId(Auth::id())->update([
                'cover' => $request->image
            ]);
        } elseif ((int)$request->type == User::AVATAR) {

            User::whereId(Auth::id())->update([
                'avatar' => $request->image
            ]);
        }
        return $this->successStatus('update image successfully');
    }


     /**
     * Register new user
     * @param  UpdateUserDetailsRequest $request
     * @return mixed
     */
    public function updateUserDetails(UpdateUserDetailsRequest $request)
    {
     
        $request['password'] = bcrypt($request->password);

        $user = User::find(Auth::user()->id)->update([
            'full_name' => $request->full_name,
            'email' =>  $request->email,
            'country_code' =>  $request->country_code,
            'mobile' => $request->mobile,
            'password' =>  $request->password,
            'city_id' =>  $request->city_id,
            'country_id' =>  $request->country_id,
            'avatar' =>  $request->avatar,
        ]);

        return $this->respondWithItem(new UserTinyResource(User::find(Auth::user()->id)));
        //return $this->successStatus(__("send code to your number - 4444"));
    }
}
