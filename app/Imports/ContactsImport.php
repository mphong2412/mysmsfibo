<?php

namespace App\Imports;

use App\contacts;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;

class ContactsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        return new contacts([
            'phone' =>$row[0],
            'full_name' =>$row[1],
            'gender' =>$row[2],
            'email' =>$row[3],
            'birthday' =>$row[4],
            'address' =>$row[5],
        ]);
    }
}
