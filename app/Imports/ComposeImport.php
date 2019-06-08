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

      
      foreach($reader as $key => $value){
          $lists['phone'] = $value;
      }dd($lists);
    }

    public function headingRow(): int
    {
      return 1;
    }
}
