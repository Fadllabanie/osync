<?php

namespace App\Http\Resources\Users\Cards;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CardCollection extends ResourceCollection
{

    public $collects = CardTinyResource::class;

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */

    public function toArray($request)
    {
        return [
            'status' => 1,
            'message' => __('Success Request'),
            'data' => parent::toArray($request),
        ];
    }
}
