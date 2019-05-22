<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller{

  public function getLoginAdmin(){
     return view('page.login');
  }

  public function postLoginAdmin(Request $request){
    $this->validate($request,[
        'email'=>'required',
        'password'=>'required|min:6',
        ],[
          'email.email'=>'Bạn nhập sai form email (@.)',
          'email.required'=>'Bạn chưa nhập Email',
          'password.required'=>'Bạn chưa nhập Pass',
          'password.min'=>'Password phai co it nhat 6 ky tu',
        ]);
        // $credentials = array('email'=>$request->email,'password'=>$request->password);
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password,]))
        {
          return redirect('index');
        // }elseif(Auth::attempt(['email'=>$request->email,'password'=>$request->password,'status'=> 0]))
        // {
        //   return redirect('login')->with('thongbao','DeActive');
        }
        else{
          return redirect('login')->with('thongbao','Đăng nhập không thành công');
        }
  }

  public function getRegisterAdmin(){
     return view('page.register');
  }

  public function postRegisterAdmin(Request $request){
    $this->validate($request,
      [
        'email'=>'required|email|unique:users,email',
        'username'=> 'required',
        'password'=>'required|min:6',
        're_password' => 'required | same:password'
      ],[
        'email.required'=>'Vui lòng nhập email',
        'email.email' => 'Không đúng định dạng email',
        'email.unique' => 'Email đã có người sử dụng',
        'password.required' => 'Vui lòng nhập mật khẩu',
        're_password.same' => 'Password không giống nhau',
        'password.min' => 'Password có ít nhất 6 kí tự'
      ]);
    $user = new User();
    $user->fullname = $request->fullname;
    $user->username = $request->username;
    $user->email = $request->email;
    $user->password= Hash::make($request->password);
    $user->phone = $request->phone;
    $user->address = $request->address;
    $user->save();
    return redirect()->back()->with('thongbao','Tạo tài khoản thành công');
  }
}
