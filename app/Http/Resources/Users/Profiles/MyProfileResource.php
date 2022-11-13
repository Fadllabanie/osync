<?php

namespace App\Http\Resources\Users\Profiles;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Users\Profiles\PortfolioResource;

class MyProfileResource extends JsonResource
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
            'from_cooperate' => (bool) $this->from_cooperate,
            'code' => $this->code,
            'role' =>  $this->role,
            'industrie' =>  $this->industrie->name,
            'prefix' => $this->prefix,
            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name,
            'last_name' => $this->last_name,
            'nike_name' => $this->nike_name,
            'email' => $this->email,
            'mobile' => $this->mobile,
            'home_phone' => $this->home_phone,
            'gender' => gender($this->gender),
            'birthday' => $this->birthday,
            'organization' => $this->organization,
            'organization_url' => $this->organization_url,
            'organization_address' => $this->organization_address,
            'work_email' => $this->work_email,
            'work_mobile' => $this->work_mobile,
            'fax' => $this->fax,
            'display_fields' => $this->display_fields,
            'display_links' => (bool) $this->display_links,
            'links' => (bool) $this->display_links == true || Auth::id() == $this->user_id ? LinkResource::collection($this->links ? $this->links : "") : [],
            'portfolio' => PortfolioResource::collection($this->portfolios ? $this->portfolios : "")
        ];
    }
}
