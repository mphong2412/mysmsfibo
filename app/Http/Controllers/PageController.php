<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\templates;
use App\list_services;
use Illuminate\Support\Facades\Session;

class PageController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }
    //check role and save session
    public function getIndex(){
      $a = Session::get('key_function');
      // dd($a);
      if (Gate::denies('enable_function', 'compose')) {
          return view('page.error.deactive');
      }
      return view('page.trangchu');
    }

    public function getTemplates(){
        $service = list_services::all();
        $templates = templates::orderBy('id')->paginate(10);
        return view('page.templates',['templates'=>$templates]);
    }

    public function getCompose(){
      if (Gate::allows('check_role')) {
          return view('page.error.403');
        }else{
      return view('page.compose');
      }
    }
}
