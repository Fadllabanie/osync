<?php

namespace App\Http\Resources\Users;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Users\Profiles\ProfileResource;
use App\Http\Resources\Users\Profiles\MyProfileResource;

class UserLargeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return  [
            'id' => $this->id,
            'full_name' => $this->full_name,
            'code' => $this->code,
            'mobile' => $this->mobile,
            'email' => $this->email,
            'country' => $this->country->name,
            'city' => $this->city->name,
            'avatar' => asset($this->avatar),
            'cover' => asset($this->cover),
            'profiles' => Auth::id() == $this->id ? MyProfileResource::collection($this->profiles) : ProfileResource::collection($this->profiles)
        ];
    }
}
