<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Enums\ERoleUser;
use App\Enums\EStatusUser;
use App\Services\UserService;
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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserService $userService)
    {
        $this->middleware('guest')->except('logout');
        $this->userService = $userService;

    }

    /**
    * Check if status = 1 accept Login, else account block
    * status = 1 active account and status = 0 deactive.
    */

    protected function authenticated(Request $request) {

        if(Auth::user()->role === ERoleUser::ADMIN) {
            return redirect()->intended($this->redirectPath());

        } else if(Auth::user()->status === EStatusUser::DEACTIVE) {
            Auth::logout();
            return redirect('login')->with('error_account', 'Tài khoản của bạn đã bị ngừng sử dụng! Vui lòng liên hệ admin.');
        
        } else {
            $authorizationUser = $this->userService->getAuthorization(auth()->id());
            Session::put('key_function', $authorizationUser);
            return redirect()->intended($this->redirectPath());

        }
    }
}
