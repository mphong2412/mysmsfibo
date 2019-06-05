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
        $data = Excel::import(new ComposerImport, $path)->get();
        dd($data);
        if(!empty($data) && $data->count()) {
             foreach($data->toArray() as $key=>$value) {
               if(!empty($value)) {

               }
             }
        }
      }
  }
}
