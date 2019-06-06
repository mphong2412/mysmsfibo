<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use App\Imports\ComposeImport;

class ExcelController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function readImport(Request $request) {
      if($request->hasFile('inputfile')) {
        $path = $request->file('inputfile')->getRealPath();
        $data = Excel::import(new ComposeImport, $path);
        $reader = array($data);
        // dd($request->all());
        // foreach($reader as $value){
        //   $arr[] = [
        //     'phone' => $value->phone,
        //     'birhtday' => $value->birthday,
        //     'name' => $value->name
        //   ];
        // }
        // if(!empty($data)) {
        //   foreach($data as $d) {dd($value);
        //     if(!empty($value)) {
        //     }
        //   }
        // }
      }
  }
}
