<?php

namespace App\Imports;

use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ProfilesImport implements ToModel, WithValidation, WithHeadingRow
{
    use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if(Auth::user()->hasRole('corporate admin'))
            $admin_id = Auth::user()->id;
        if(Auth::user()->hasRole('corporate manager'))
            $admin_id = Auth::user()->admin_id;
        $profile = new Profile([
            "first_name"=>$row['first_name'],
            "last_name" =>$row['last_name'],
            "mobile"=>$row['mobile'],
            "email" =>$row['e_mail'],
            "role" =>$row['role'],
            "code" => generateRandomCode('PRF'),
            "status" => true,
            "from_cooperate" => true,
            "admin_id" => $admin_id
        ]);
        return $profile;
    }

    public function startRow(): int
    {
        return 2;
    }

    public function rules(): array
    {
        return [
            'first_name' => ['required', 'min:2', 'max:100'],
            'last_name' => ['required', 'min:2', 'max:100'],
            'mobile' => ['nullable'],
            'e_mail' => ['nullable', 'email'],
            'role' => ['required']
        ];
    }
}
