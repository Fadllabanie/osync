<?php

namespace App\Http\Resources\Users\Contacts;

use Illuminate\Http\Resources\Json\JsonResource;

class ContactResource extends JsonResource
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
            'role' => profileRole($this->id),
            'avatar'=> asset($this->avatar),
        ];
    }
}
