<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;


class ComposeImport implements ToModel, WithHeadingRow
{

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        return new compose([
            'phone' =>$row['phone'],
            'birthday' =>$row['birthday'],
            'name' =>$row['fullname'],
        ]);
    }

    public function headingRowPhone(): int
    {
        return 1;
    }

}
