<?php

namespace App\Http\Resources\Users\Profiles;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Users\Profiles\PortfolioResource;

class ProfileResource extends JsonResource
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
            'code' => $this->code,
            'from_cooperate' => (bool) $this->from_cooperate,
            'role' =>  isHidden('role', $this->display_fields, $this->role),
            'industrie' =>  $this->industrie->name,
            'prefix' => $this->prefix,
            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name,
            'last_name' => $this->last_name,
            'nike_name' => isHidden('email', $this->display_fields, $this->nike_name),
            'email' => isHidden('email', $this->display_fields, $this->email),
            'mobile' => $this->mobile,
            'home_phone' =>  isHidden('birthday', $this->display_fields, $this->home_phone),
            'gender' => isHidden('gender', $this->display_fields, gender($this->gender)),
            'birthday' => isHidden('birthday', $this->display_fields, $this->birthday),
            'organization' => isHidden('role', $this->display_fields, $this->organization),
            'organization_url' => isHidden('organization_url', $this->display_fields, $this->organization_url),
            'organization_address' => isHidden('organization_address', $this->display_fields, $this->organization_address),
            'work_email' => isHidden('work_email', $this->display_fields, $this->work_email),
            'work_mobile' => isHidden('work_mobile', $this->display_fields, $this->work_mobile),
            'fax' => isHidden('fax', $this->display_fields, $this->fax),
            'links' => (bool)$this->display_links == true ? LinkResource::collection($this->links ? $this->links : "") : [],
            'portfolio' => PortfolioResource::collection($this->portfolios ? $this->portfolios : "")
        ];
    }
}
