<?php

namespace App\Http\Resources\Users\Profiles;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Users\Profiles\PortfolioResource;

class ProfileRoleResource extends JsonResource
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
            'role' =>  $this->role,
           ];
    }
}
