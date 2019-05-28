<?php

namespace App\Exports;

use App\contacts;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;


class ContactsExport implements FromCollection
{

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return contacts::select('phone','full_name')->get();
    }
}
