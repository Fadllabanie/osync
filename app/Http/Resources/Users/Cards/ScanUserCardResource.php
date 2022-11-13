<?php

namespace App\Http\Resources\Users\Cards;

use App\Models\Follower;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Users\Profiles\ProfileResource;

class ScanUserCardResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $follower = Follower::where('follower_id',Auth::id())->where('following_id',$this->client->id)->first();
       
        return  [
            'id' => $this->id,
            'category' => $this->category->name,
            'name' => $this->name ?? "no name",
            'is_my_contact' => (boolean) $follower != null ? true : false,
            'user' => [
                'id' => $this->client->id,
                'full_name' => $this->client->full_name,
                'code' => $this->client->code,
                'mobile' => $this->client->mobile,
                'email' => $this->client->email,
                'avatar' => asset($this->client->avatar),
                'cover' => asset($this->client->cover),
            ],
            'profiles' => ProfileResource::collection($this->profiles),
          
        ];
    }
}
