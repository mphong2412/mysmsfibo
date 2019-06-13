<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use Validator;
use App\Imports\ComposeImport;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use PHPExcel;
use PHPExcel_IOFactory;

class ExcelController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function readImport(Request $request) {
    $phonefalse = array();

    // array_push($a, 'phone');
    // dd($check);
    $this -> validate(
      $request, [
        'inputfile' => 'required|mimes:xls,xlsx'
      ],[
        'inputfile.required' => 'Không tìm thấy file excel được nhập',
        'inputfile.mimes' => 'Không đúng định dạng file excel'
      ]);
      //$check = preg_match('/((09|03|07|08|05)+([0-9]{8})\b)/', '$phonetrue');

      $listPhone = array();
      $data = Excel::toArray(new ComposeImport, $request->file('inputfile'));
      foreach ($data as $value){
        foreach($value as $c){
          $listPhone = $c[0];
          $check = preg_match('/((09|03|07|08|05)+([0-9]{8})\b)/', $listPhone);
          if($check == 0){
            array_push($phonefalse, $listPhone);
            //return redirect('compose')->with('phoneError',$phonefalse);
          } else {
            // return redirect('page.sms.compose');
          }
        }
      }
    return redirect()->back();
  }

}
