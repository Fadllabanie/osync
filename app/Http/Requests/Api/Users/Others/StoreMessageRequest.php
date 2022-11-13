<?php

namespace App\Http\Requests\Api\Users\Others;

use App\Http\Requests\Api\APIRequest;

class StoreMessageRequest extends APIRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
           // 'name' => 'required|string',
           // 'phone' => 'required|string',
           // 'email' => 'required|string|email',
            'title' => 'required|string|min:3|max:250',
            'message' => 'required|string|min:3'
        ];
    }
}
