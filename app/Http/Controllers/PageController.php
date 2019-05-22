<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\templates;
use App\list_services;
use session;

class PageController extends Controller
{
    public function getIndex(){
      return view('page.trangchu');
    }
    public function getTemplates(){
      $templates = templates::orderBy('id')->paginate(5);
      return view('page.templates',['templates'=>$templates]);
    }

    public function getCompose(){
      return view('page.compose');
    }
}
