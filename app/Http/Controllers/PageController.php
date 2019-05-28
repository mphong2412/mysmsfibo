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
      return view('page.trangchu');
    }

    public function getTemplates(){
        $service = list_services::all();
        $templates = templates::orderBy('id')->paginate(10);
        return view('page.templates',['templates'=>$templates]);
    }

    public function getCompose(){
      return view('page.sms.compose');
    }
}
