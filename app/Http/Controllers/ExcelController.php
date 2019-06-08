<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use Validator;
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
        if(isset($data)){
          foreach($data as $key => $value){
            $rows[] = array(
            $phone = 'phone'  => $value['phone'],
            'birthday'   => $value['birthday'],
            'name'   => $value['name']
          );
        }
      }
      }
  }
}
