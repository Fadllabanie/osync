<?php

namespace App\Http\Requests\Api\Users\Cards;

use App\Http\Requests\Api\APIRequest;

class ScanCardRequest extends APIRequest
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
            'token' => 'required|exists:cards,token',
            'name' => 'required|string|min:2',
            'profiles.*' => 'required'
        ];
    }
}
