<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/index';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    /**
    * Check status = 1 get Login,
    * status = 1 active account and status = 0 deactive.
    */
    protected function authenticated(Request $request){
       session::put(['check_role' => $request->user]);
       session()->save();
      if(Auth::attempt(['email'=>$request->email,'password'=>$request->password,'status' => 0])){
        Auth::logout();
        //$request->session()->flash('alert-danger', 'Your Account is not activated yet.');
        return redirect('login')->with('thongbao','DeActive');
      }else
      return redirect()->intended($this->redirectPath());
    }

    // protected function credentials(\Illuminate\Http\Request $request)
    // {
    //     //return $request->only($this->username(), 'password');
    //     return ['email' => $request->{$this->username()}, 'password' => $request->password, 'status' => 1];
    // }
}
