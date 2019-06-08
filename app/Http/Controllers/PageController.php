<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\templates;
use App\list_services;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use App\notices;

class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //check role and save session
    public function getIndex()
    {
      $a = Session::get('key_function');
        // $a = session()->get('user');
        // dd($a);
        // $a = session()->get('da');
        // dd($a);
        // if (Gate::allows('check_status')) {
        //     return view('page.error.deactive');
        // }
        $notices = notices::all();
        return view('page.trangchu', ['notices'=>$notices]);
    }

    public function getTemplates()
    {
        $notices = notices::all();
        $service = list_services::all();
        $templates = templates::orderBy('id')->paginate(10);
        return view('page.templates', ['templates'=>$templates,'notices'=>$notices]);
    }

    public function getCompose()
    {
      $notices = notices::all();
        if (Gate::allows('check_role')) {
            return view('page.error.403');
        } else {

            return view('page.sms.compose', ['notices'=>$notices]);
        }
    }
}
