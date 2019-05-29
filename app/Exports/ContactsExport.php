<?php

namespace App\Exports;

use App\contacts;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;


class ContactsExport implements FromCollection, WithHeadings
{

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return contacts::select('phone','full_name')->get();
    }

    public function headings(): array
    {
        return [
           'Phone',
           'Full Name'
        ];
    }
}
