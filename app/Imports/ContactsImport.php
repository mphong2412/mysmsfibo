<?php

namespace App\Imports;

use App\contacts;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;

class ContactsImport implements ToModel, WithHeadingRow, WithValidation
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
            // 'contact_groups_id' =>$row['contact_groups_id'],
        ]);
    }
    public function headingRow(): int
    {
        return 1;
    }

    public function rules(): array
    {
        return[
            'phone'=>['required','digits:10','unique:contacts,phone'],
        ];
    }

    public function customValidationMessages()
    {
        return [
        'phone.required' => 'Không được bỏ trống số điện thoại.',
        'phone.digits' => 'Số điện thoại hợp lệ.',
        'phone.unique' => 'Số điện thoại đã tồn tại.',
    ];
    }
}
