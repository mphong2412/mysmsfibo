<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\templates;
use App\list_services;
use session;

class PageController extends Controller
{
    public function getIndex(){
      if (Gate::allows('create_compose', 'aaaaa')) {
          abort(403, 'Unauthorized action.');
      }
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
