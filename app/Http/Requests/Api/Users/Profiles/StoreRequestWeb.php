<?php

namespace App\Http\Requests\Api\Users\Profiles;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequestWeb extends FormRequest
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
            'prefix' => ['nullable','max:100'],
            'first_name' => ['required', 'min:2', 'max:100'],
            'middle_name' => ['required', 'min:2', 'max:100'],
            'last_name' => ['required', 'min:2', 'max:100'],
            'nike_name' => ['nullable', 'min:2', 'max:100'],
            'email' => ['required', 'email'],
            // 'gender' => ['required', 'in:1,2,3'],
            // 'birthday' => ['required', 'date'],
            'mobile' => ['required'],
            'organization' => ['required'],
            'organization_url' => ['required'],
            'organization_address' => ['nullable'],
            'role' => ['required'],
           // 'fax' => ['nullable'],
            'work_mobile' => ['required'],
            'work_email' => ['required'],
            'home_phone' => ['nullable'],
            'links_url.*' => ['sometimes'],
            'links_name.*' => ['sometimes'],
        ];
    }
}
