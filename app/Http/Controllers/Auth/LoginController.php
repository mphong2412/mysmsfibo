<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use DB;

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
      if(Auth::attempt(['email'=>$request->email,'password'=>$request->password,'status' => 0])){
        Auth::logout();
        //$request->session()->flash('alert-danger', 'Your Account is not activated yet.');
        return redirect('login')->with('thongbao','DeActive');
      }else
      $iduser = auth()->id();
      $result = DB::table('authorization')
                ->join('users', 'authorization.user_id', '=', 'users.id')
                ->join('list_function','authorization.function_id', '=', 'list_function.id')
                ->where('users.id', '=', $iduser)
                ->select('function_name')->get();
      //dd($iduser);
      //query get authen
      // Session::put('check_rolee', Auth::user());
      Session::put('key_function', $result);
      return redirect()->intended($this->redirectPath());
    }

    // protected function credentials(\Illuminate\Http\Request $request)
    // {
    //     //return $request->only($this->username(), 'password');
    //     return ['email' => $request->{$this->username()}, 'password' => $request->password, 'status' => 1];
    // }
}
