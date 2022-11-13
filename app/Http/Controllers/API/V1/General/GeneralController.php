<?php

namespace App\Http\Controllers\API\V1\General;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Api\Users\Others\StoreMessageRequest;

class GeneralController extends Controller
{
    /**
     * upload media
     * @param  Request $request
     * @return mixed
     */
    public function upload(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'file' => 'required',
            'path' => 'required',
        ]);

        if ($validatedData->fails()) {
            return $this->errorStatus($validatedData->errors()->first());
        }

        if ($request->has('old_file')) {
            File::delete($request->old_file);
        }

        return $this->respondWithItem(upload($request->file, $request->path));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sendMessage(StoreMessageRequest $request)
    {
        $request['name'] = Auth::user()->full_name;
        $request['mobile'] = Auth::user()->mobile;
        $request['email'] = Auth::user()->email;
        $request['code'] = generateRandomCode('MSG');

        Message::create($request->all());

        return $this->successStatus();
    }
}
