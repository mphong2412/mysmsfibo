<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\composes;

class ComposeImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $reader) {
      $phone = array();
      foreach($reader as $key => $value){
        $phone[] = $value[0];
      }
    }

    public function headingRow(): int
    {
      return 1;
    }
}
