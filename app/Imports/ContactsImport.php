<?php

namespace App\Imports;

use App\contacts;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;


class ContactsImport implements ToModel, WithHeadingRow
{

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        return new contacts([
            'phone' =>$row['phone'],
            'full_name' =>$row['full_name'],
            'contact_groups_id' =>$row['contact_groups_id'],
        ]);
    }
    public function headingRow(): int
    {
        return 1;
    }

}
