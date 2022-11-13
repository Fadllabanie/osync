<?php

namespace App\Http\Requests\Api\Users\Auth;

use App\Http\Requests\Api\APIRequest;

class RegisterRequest extends APIRequest
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
            'full_name' => 'required|min:3|max:100',
            'email' => 'required|email|unique:users',
            'mobile' => 'required|unique:users',
            'password' => 'sometimes|min:8',
            'city_id' => ['required', 'exists:cities,id'],
            'country_id' => ['required', 'exists:countries,id'],
            'device_id' => 'required',
            'device_type' => 'required',
            'social_token' => 'sometimes',
            'type' => 'sometimes',
        ];
    }
}
