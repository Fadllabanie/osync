<?php

namespace App\Http\Controllers\API\V1\Users\Profiles;

use App\Models\Card;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Api\Users\Profiles\StoreRequest;
use App\Http\Requests\Api\Users\Profiles\UpdateRequest;
use App\Http\Resources\Users\Profiles\MyProfileResource;
use App\Http\Resources\Users\Profiles\ProfileRoleResource;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profiles = Profile::mine()->get();

        return ProfileRoleResource::collection($profiles);
    }

    public function linkToCard(Request $request)
    {

        // check if user in coop
        // make user_id not required  
        // created profile form dashboard - attach auth user to this profile and card
        $profile = Profile::where('code', $request->code)->first();

        Card::where('token', $request->card_token)->update([
            'client_id' => Auth::id(),
            'name' => "New Card"
        ]);
        $card = Card::where('token', $request->card_token)->first();
        DB::table('card_profile')->insert([
            'user_id' => Auth::id(),
            'profile_id' => $profile->id,
            'card_id' => $card->id,
        ]);

        return $this->successStatus('link profile to card successfully');
    }

    public function linkToProfile(Request $request)
    {
        $card = Card::where('token', $request->card_token)->first();
        if (!$card) return $this->errorStatus('Card Not Found...!');

        $profile = Profile::where('code', $request->profile_code)->first();
        if (!$profile) return $this->errorStatus('Profile Not Found...!');

        DB::table('card_profile')->where('card_id', $card->id)->update([
            'profile_id' => $profile->id,
            'card_id' => $card->id,
            'user_id' => Auth::id(),
        ]);

        Profile::where('code', $request->profile_code)->update([
            'user_id' => Auth::id(),
        ]);

        return $this->successStatus('link to User to Card successfully');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        //dd($request->all());
        $request['user_id'] = Auth::id();
        $request['code'] = generateRandomCode('PRF');
        $request['status'] = true;

        if ($request->email == null) {
            $request['email'] = Auth::user()->email;
        }

        $profile = Profile::create($request->all());

        if ($request->has('links_name') && $request->has('links_url')) {
            if ($request->links_name[0] != null or $request->links_url[0] != null) {
                foreach ($request->links_name as $key => $name) {
                    // DB::table('profile_links')->insert([
                    //     'profile_id' => $profile->id,
                    //     'name' => $name,
                    //     'created_at' => now(),
                    // ]);
                    $id =  DB::table('profile_links')->insertGetId([
                        'profile_id' => $profile->id,
                        'name' => $name,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                    DB::table('profile_links')
                        ->where('id', $id)
                        ->where('profile_id', $profile->id)
                        ->update([
                            'url' => $request->links_url[$key],
                        ]);
                    // }
                    // foreach ($request->links_url as $url) {
                    //     DB::table('profile_links')->where('profile_id', $profile->id)->update([
                    //         'url' => $url,
                    //         'updated_at' => now(),
                    //     ]);
                }
            }
        }


        if ($request->has('portfolios_name') && $request->has('portfolios_url')) {
            if ($request->portfolios_name[0] != null or $request->portfolios_url[0] != null) {
                foreach ($request->portfolios_name as $key => $name) {
                    // DB::table('profile_port_folios')->insert([
                    //     'profile_id' => $profile->id,
                    //     'name' => $name,
                    //     'created_at' => now(),
                    // ]);
                    $id =  DB::table('profile_port_folios')->insertGetId([
                        'profile_id' => $profile->id,
                        'name' => $name,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                    // }
                    // foreach ($request->portfolios_url as $url) {
                    //     DB::table('profile_port_folios')->where('profile_id', $profile->id)->update([
                    //         'url' => $url,
                    //         'updated_at' => now(),
                    //     ]);
                    DB::table('profile_port_folios')
                        ->where('id', $id)
                        ->where('profile_id', $profile->id)
                        ->update([
                            'url' => $request->portfolios_url[$key],
                        ]);
                }
            }
        }
        if ($request->card_token != null) {

            Card::where('token', $request->card_token)->update([
                'client_id' => Auth::id(),
                'name' => "New Card"
            ]);

            $card = Card::where('token', $request->card_token)->first();

            DB::table('card_profile')->insert([
                'user_id' => Auth::id(),
                'profile_id' => $profile->id,
                'card_id' => $card->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        return $this->respondWithItem(new MyProfileResource($profile));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profile = Profile::with('links', 'portfolios')->mine()->whereId($id)->first();

        if (!$profile) return $this->errorStatus(__("not found...!"));

        return $this->respondWithItem(new MyProfileResource($profile));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request)
    {

        $profile = Profile::mine()->whereId($request->profile_id)->first();

        if (!$profile) return $this->errorStatus(__("not found...!"));

        $profile->update($request->all());

        if ($request->links_name[0] != null or $request->links_url[0] != null) {
            DB::table('profile_links')->where('profile_id', $profile->id)->delete();

            foreach ($request->links_name as $key => $name) {

                $id =  DB::table('profile_links')->insertGetId([
                    'profile_id' => $profile->id,
                    'name' => $name,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
                // foreach ($request->links_url as $url) {
                DB::table('profile_links')
                    ->where('id', $id)
                    ->where('profile_id', $profile->id)
                    ->update([
                        'url' => $request->links_url[$key],
                    ]);
                // }
            }
        }

        if ($request->has('portfolios_name') and $request->has('portfolios_url')) {
            if ($request->portfolios_name[0] != null or $request->portfolios_url[0] != null) {
                DB::table('profile_port_folios')->where('profile_id', $profile->id)->delete();

                foreach ($request->portfolios_name as $key =>  $name) {
                    $id =  DB::table('profile_port_folios')->insertGetId([
                        'profile_id' => $profile->id,
                        'name' => $name,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);

                    // foreach ($request->portfolios_url as $url) {
                    DB::table('profile_port_folios')
                        ->where('id', $id)
                        ->where('profile_id', $profile->id)
                        ->update([
                            'url' => $request->portfolios_url[$key],
                        ]);
                    // }
                }
            }
        }
        return $this->respondWithItem(new MyProfileResource($profile));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function availabilityLinks($id)
    {
        $profile = Profile::mine()->whereId($id)->first();

        if (!$profile) return $this->errorStatus(__("not found...!"));

        if ($profile->display_links == true) {
            $profile->update(['display_links' => false]);
        } else {
            $profile->update(['display_links' => true]);
        }

        return $this->respondWithItem(new MyProfileResource($profile));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function availabilityField(Request $request)
    {
        if ($request->type == 'profile') {
            $profile = Profile::mine()->whereId($request->profile_id)->first();
        } elseif ($request->type == 'user') {
        }

        if (!$profile) return $this->errorStatus(__("not found...!"));

        if ($profile->display_links == true) {
            $profile->update(['display_links' => false]);
        } else {
            $profile->update(['display_links' => true]);
        }

        return $this->successStatus();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function profileAppear(Request $request, $id)
    {
        $profile = Profile::mine()->whereId($id)->first();

        if (!$profile) return $this->errorStatus(__("not found...!"));

        $profile->update([
            'status' => !$profile->status
        ]);

        return $this->respondWithItemName('profile_status', $profile->status);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $profile = Profile::mine()->whereId($id)->first();

        if (!$profile) return $this->errorStatus(__("not found...!"));

        $profile->delete();

        return $this->successStatus(__("delete profile successfully"));
    }
}
