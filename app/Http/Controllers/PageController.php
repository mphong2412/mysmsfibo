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
      $template = templates::all();
      return view('page.templates',compact('template'));
    }

    public function getCompose(){
      return view('page.compose');
    }
}
