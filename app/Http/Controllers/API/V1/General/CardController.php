<?php

namespace App\Http\Controllers\API;

use App\Models\Card;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //->select('id','token','profile_id','client_id','created_at')
        $cards = Card::query();
        if (isset($request['client_id']))
            $cards = $cards->where('client_id', $request['client_id']);
        if (isset($request['profile_id']))
            $cards = $cards->where('profile_id', $request['profile_id']);
            
        $cards = $cards->get()->makeHidden(['client_id', 'manager_id']);


        return response()->json(['cards' => $cards], $this->successStatus);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'client_id' => 'nullable',
            'profile_id' => 'required',
            'token' => 'required|exists:cards,token'
        ]);
        $data = $request->all();
        $card = Card::where('token', $request['token'])->first();
        if ($card->profile_ids) {
            $profile_ids = $card->profile_ids;
            array_push($profile_ids, $request['profile_id']);
            $card->profile_ids = $profile_ids;
        } else
            $card->profile_ids = [$request['profile_id']];

        $card->client_id = $request['client_id'] ? $request['client_id'] : $card->client_id;
        $card->save();

        return response()->json(['card' => $card], $this->successStatus);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $card = Card::where('id', $id)->orWhere('token', $id)->first();
        return response()->json(['card' => $card], $this->successStatus);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function destroy(Card $card)
    {
        //
    }
}
