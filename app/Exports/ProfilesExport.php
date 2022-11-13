<?php

namespace App\Exports;

use App\Models\Profile;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProfilesExport implements FromCollection, WithMapping,  WithHeadings
{
    protected $profiles;

    function __construct($profiles) {
        $this->profiles = $profiles;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->profiles;
    }
    public function map($profile): array
    {
        return [
            $profile->id,
            $profile->first_name,
            $profile->middle_name,
            $profile->last_name,
            $profile->role,
            $profile->code,
        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            'First Name',
            'Middle Name',
            'Last_Name',
            'Role',
            'Code'

        ];
    }
}

