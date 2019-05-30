<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\templates;
use App\list_services;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

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



      public function postCompose(Request $request){
      $this->validate($request,[
        'mobile' => 'required|size:10|regex:/(09|01[2|6|8|9])+([0-9]{8})\b/g'
      ],[
        'mobile.required' => 'Input phone now !',
        'mobile.size' => 'Ivali'
      ]);
      return redirect('compose')->with('errPhone','number valid');
    }
}
