<?php

namespace App\Http\Requests\Web\Profile;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrCreateProfileRequest extends FormRequest
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
            'profile_type' => ['required', 'in:adult,child,animal'],
            'avatar' => ['required', 'image', 'size:1024'],
            'first_name' => ['required'],
            'last_name' => ['required_if:profile_type,adult'],
            'mobile' => ['required'],
            'birthday' => ['required'],
            'gender' => ['required'],

            'blood_type' => ['required_if:profile_type,adult'],


            'blood_type' => ['required_if:profile_type,child'],
            'home_address' => ['required_if:profile_type,child'],
            'school_address' => ['required_if:profile_type,child'],


            'anima_type' => ['required_if:profile_type,animal'],
            'home_phone' => ['required'],
            'owner_mobile' => ['required_if:profile_type,animal'],

        ];
    }
}
