<?php

namespace App\Exports;

use App\Models\Profile;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProfilesExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Profile::get(['houseNum', 'firstname', 'middlename', 'lastname', 'gender', 'age']);
    }


    public function headings(): array
    {
        return ["houseNum", "firstname", "middlename", "lastname", "gender", "age"];
    }
}
