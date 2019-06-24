<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use App\contact_groups;
use Validator;
use App\notices;
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
    $notices = notices::all();
    $group = contact_groups::orderBy('id')->get();
    $this -> validate(
      $request, [
        'inputfile' => 'required|mimes:xls,xlsx'
      ],[
        'inputfile.required' => 'Không tìm thấy file excel được nhập',
        'inputfile.mimes' => 'Không đúng định dạng file excel'
      ]);
      //$check = preg_match('/((09|03|07|08|05)+([0-9]{8})\b)/', '$phonetrue');
      $phonefalse = array();
      $phonetrue = array();
      $listPhone = array();
      $data = Excel::toArray(new ComposeImport, $request->file('inputfile'));
      foreach ($data as $value){
        foreach($value as $c){
          $listPhone = $c[0];
          $check = preg_match('/((09|03|07|08|05)+([0-9]{8})\b)/', $listPhone);
          if($check == 0){
            array_push($phonefalse, $listPhone);
            // return $phonefalse;
          } else {
            array_push($phonetrue, $listPhone);
          }
        }
      }
      return view('page.sms.compose',['phonefalse' => $phonefalse, 'notices' => $notices,'group' => $group, 'phonetrue'=>$phonetrue]);
  }
}
