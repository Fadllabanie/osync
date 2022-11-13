<?php

namespace App\Http\Controllers\API\V1\Users\Cards;

use App\Models\Card;
use App\Models\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Users\Cards\CardCollection;
use App\Http\Resources\Users\Cards\ScanCardResource;
use App\Http\Requests\Api\Users\Cards\ScanCardRequest;
use App\Http\Resources\Users\Cards\ScanUserCardResource;
use App\Http\Resources\Users\Profiles\ProfileRoleResource;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(Auth::id());
        $cards = Card::with('profiles', 'category')->mine()->get();

        return new CardCollection($cards);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ScanCardRequest $request)
    {
        $card = Card::with('profiles.links', 'profiles.portfolios')->where('token', $request->token)->first();

        if ($card->client_id != null) {
            if (!$card) return $this->errorStatus(__("card have another user...!"));
        }

        ## edit 30-8

         $ids = Profile::mine()->pluck('id')->toArray();

        // foreach ($request->profiles as $profile) {
        //     if (!in_array($profile, $ids)) {
        //         return $this->errorStatus(__("profiles id is wrong"));
        //     }
        // }

        // foreach ($request->profiles as $profile) {
        //     $pivot[$profile] = ['user_id' => Auth::id()];
        // }
        //$card->profiles()->sync($pivot);    ## edit 30-8


     
        $card->update([
            'name' => $request->name,
            'client_id' => Auth::id(),
        ]);
           foreach ($ids as $id) {
            $pivot[$id] = ['user_id' => Auth::id()];
        }

        $card->profiles()->sync($pivot);


        return $this->respondWithItem(new ScanCardResource($card));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function scanCard(Request $request)
    {
        $card = Card::with('client', 'profiles.links', 'profiles.portfolios', 'profiles.industrie')
            ->where('token', $request->token)->first();

        if (!$card) return $this->successStatus(__("Card Not Found....!"));

        if ($card->client_id == null) return $this->successStatus(__("Card Not Used Yet....!"));

        return $this->respondWithItem(new ScanUserCardResource($card));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function scanCardByGuest(Request $request)
    {
        $card = Card::with('client', 'profiles.links', 'profiles.portfolios')->where('token', $request->token)->first();

        if (!$card) return $this->errorStatus(__("Card Not Found....!"));

        return $this->respondWithItem(new ScanUserCardResource($card));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
