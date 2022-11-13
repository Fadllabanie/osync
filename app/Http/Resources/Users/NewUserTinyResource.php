<?php

namespace App\Http\Resources\Users;

use Illuminate\Http\Resources\Json\JsonResource;

class NewUserTinyResource extends JsonResource
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
            'created_at' => (string) $this->created_at,
            'token_type' => 'Bearer',
            'is_new' => true,
            'access_token' => $this->remember_token,
        ];
    }
}
