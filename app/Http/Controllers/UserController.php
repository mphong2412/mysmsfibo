<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller{

  public function __construct()
  {
    $this->middleware('auth');
  }



  public function getLogout(){
    Auth::logout();
    return redirect()->route('login');
  }
}
