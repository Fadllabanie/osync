<?php

namespace App\Http\Resources\Users\Cards;

use App\Models\User;
use App\Http\Resources\Users\UserLargeResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Users\Profiles\ProfileRoleResource;

class CardTinyResource extends JsonResource
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
            'token' => $this->token,
            'category' => $this->category->name,
            'name' => $this->name,
            'profiles' => ProfileRoleResource::collection($this->profiles),
          
        ];
    }
}
