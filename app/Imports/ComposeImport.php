<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\composes;
use Illuminate\Http\Request;

class ComposeImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $reader) {
      $phoneExcel = array();
    }



    // $this->collection = $reader->transform(function ($col) {
    //     return [
    //         'phone' => $col[0],
    //         //'birthday' => $col[1],
    //         // 'name' => $col[2]
    //     ];
    // });

    public function headingRow(): int
    {
        return 1;
    }




}
