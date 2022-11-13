<?php

namespace App\Http\Controllers\API\V1\Users\Contacts;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Api\Users\Profiles\StoreRequest;
use App\Http\Requests\Api\Users\Profiles\UpdateRequest;
use App\Http\Resources\Users\Contacts\ContactCollection;
use App\Http\Requests\Api\Users\Contacts\AddContactRequest;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = DB::table('users as u')
            ->join('followers as f', 'f.following_id', '=', 'u.id')
            // ->join('profiles as p', 'p.user_id', '=', 'u.id')
            ->where('f.follower_id', Auth::id())
            ->when($request->search, function ($q) use ($request) {
                $q->where('u.full_name', 'like', '%' . $request->search . '%');
                $q->orWhere('u.code', 'like', '%' . $request->search . '%');
            })
            ->when($request->industrie_id, function ($q) use ($request) {
                $q->where('p.industrie_id', $request->industrie_id);
            })
            ->when($request->city_id, function ($q) use ($request) {
                $q->where('u.city_id', $request->city_id);
            })->when($request->country_id, function ($q) use ($request) {
                $q->where('u.country_id', $request->country_id);
            })
            ->when($request->from && $request->to, function ($q) use ($request) {
                $q->whereBetween('f.created_at', [$request->from, $request->to]);
            })->select('u.id', 'u.full_name', 'u.code', 'u.avatar')
            ->orderByDesc('f.created_at')
            ->paginate(24);

        /*
        $users = DB::table('followers as f')
            ->join('users as u', 'f.following_id', '=', 'u.id')
            ->rightJoin('profiles as p','p.user_id','=',  'u.id')
            //->where('p.is_default', true)
          ///
           // ->where('p.status', true)
            ->where('f.follower_id', Auth::id())

            ->when($request->search, function ($q) use ($request) {
                $q->where('u.full_name', 'like', '%' . $request->search . '%');
                $q->orWhere('u.code', 'like', '%' . $request->search . '%');
            })
            ->when($request->industrie_id, function ($q) use ($request) {
                $q->where('p.industrie_id', $request->industrie_id);
            })
            ->when($request->city_id, function ($q) use ($request) {
                $q->where('u.city_id', $request->city_id);
            })->when($request->country_id, function ($q) use ($request) {
                $q->where('u.country_id', $request->country_id);
            })
            ->select('u.id', 'u.full_name', 'u.code', 'u.avatar','p.role')
            ->orderByDesc('f.created_at')
            ->paginate(24);
*/
        /*
        $users = User::with(['profiles', 'followings'])
            ->whereHas('followings', function ($q) {
                $q->where('follower_id', Auth::id());
            })
            ->when($request->from && $request->to, function ($q) use ($request) {
                $q->whereHas('followings', function ($q) use ($request) {
                    $q->whereBetween('created_at', [$request->from, $request->to]);
                });
            })
            ->when($request->search, function ($q) use ($request) {
                $q->where('full_name', 'like', '%' . $request->search . '%');
                $q->orWhere('code', 'like', '%' . $request->search . '%');
            })
            ->when($request->industrie_id, function ($q) use ($request) {
                $q->whereHas('profiles', function ($q) use ($request) {
                    $q->where('industrie_id', $request->industrie_id);
                });
            })
            ->when($request->city_id, function ($q) use ($request) {
                $q->where('city_id', $request->city_id);
            })
            ->when($request->country_id, function ($q) use ($request) {
                $q->where('country_id', $request->country_id);
            })
            ->select('id', 'full_name', 'code', 'avatar')
            ->orderByDesc('created_at')
            ->paginate(24);
*/
        //dd($users[0]);
        return new ContactCollection($users);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function recant()
    {
        // $user = User::with(['lastFollowers'])->find(Auth::id());

        $user = DB::table('followers as f')
            ->join('users as u', 'f.following_id', '=', 'u.id')
            ->join('profiles as p', 'p.user_id', '=', 'u.id')
            ->where('p.is_default', true)
            ->where('p.status', true)
            ->where('f.follower_id', Auth::id())
            ->select('u.id', 'u.full_name', 'u.code', 'u.avatar', 'p.role')
            ->orderByDesc('f.created_at')
            ->limit(10)
            ->get();

        return new ContactCollection($user);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addContact(AddContactRequest $request)
    {
        if (Auth::id() == $request->user_id) {
            return $this->errorStatus("Can't add yourself");
        }
        $data =  DB::table('followers')->where('follower_id', Auth::id())->where('following_id', $request->user_id)->first();

        if ($data)  return $this->errorStatus('user already added....!');

        User::find(Auth::id())->followers()->attach($request->user_id);

        return $this->successStatus();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function deleteContact(Request $request)
    {
        $data =  DB::table('followers')->where('follower_id', Auth::id())->where('following_id', $request->user_id)->first();

        if ($data) {
            Auth::user()->followers()->detach($request->user_id);
            return $this->successStatus();
        }

        return $this->errorStatus();
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
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
