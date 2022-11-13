<?php

namespace App\Http\Requests\Api\Users\Profiles;

use App\Http\Requests\Api\APIRequest;

class UpdateRequest extends APIRequest
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
            'industrie_id' => ['required','exists:industries,id'],
            'prefix' => ['nullable','max:100'],
            'first_name' => ['required', 'min:2', 'max:100'],
            'middle_name' => ['required', 'min:2', 'max:100'],
            'last_name' => ['required', 'min:2', 'max:100'],
            'nike_name' => ['required', 'min:2', 'max:100'],
            'email' => ['required', 'email'],
            'gender' => ['required', 'in:1,2,3'],
            'birthday' => ['required', 'date'],
            'mobile' => ['required'],
            'organization' => ['required'],
            'organization_url' => ['required'],
            'organization_address' => ['required'],
            'role' => ['required'],
            'fax' => ['nullable'],
            'work_mobile' => ['required'],
            'work_email' => ['required'],
            'home_phone' => ['required'],
            'links_url.*' => ['sometimes'],
            'links_name.*' => ['sometimes'],
            'portfolios_url.*' => ['sometimes'],
            'portfolios_name.*' => ['sometimes'],
            'display_fields.*' => ['required'],
        ];
    }
}
