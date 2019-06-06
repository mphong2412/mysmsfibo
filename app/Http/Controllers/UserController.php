<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\account;
use App;
use validator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function getLoginAdmin()
    {
        return view('page.login');
    }

    public function postLoginAdmin(Request $request)
    {
        $this->validate($request, [
        'email'=>'required',
        'password'=>'required|min:6',
        ], [
          'email.email'=>'Bạn nhập sai form email (@.)',
          'email.required'=>'Bạn chưa nhập Email',
          'password.required'=>'Bạn chưa nhập Pass',
          'password.min'=>'Password phai co it nhat 6 ky tu',
        ]);
        // $credentials = array('email'=>$request->email,'password'=>$request->password);
        if (Auth::attempt(['email'=>$request->email,'password'=>$request->password,'status' => 1])) {
            return redirect('index');
        } elseif (Auth::attempt(['email'=>$request->email,'password'=>$request->password,'status'=> 0])) {
            return redirect('login')->with('thongbao', 'DeActive');
        } else {
            return redirect('login')->with('thongbao', 'Đăng nhập không thành công');
        }
    }

    public function getRegisterAdmin()
    {
        return view('page.register');
    }

    public function postRegisterAdmin(Request $request)
    {
        $this->validate(
            $request,
            [
        'email'=>'required|email|unique:users,email',
        'username'=> 'required',
        'password'=>'required|min:6',
        're_password' => 'required | same:password'
      ],
            [
        'email.required'=>'Vui lòng nhập email',
        'email.email' => 'Không đúng định dạng email',
        'email.unique' => 'Email đã có người sử dụng',
        'password.required' => 'Vui lòng nhập mật khẩu',
        're_password.same' => 'Password không giống nhau',
        'password.min' => 'Password có ít nhất 6 kí tự'
      ]
    );
        $user = new User();
        $user->fullname = $request->fullname;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password= Hash::make($request->password);
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->save();
        return redirect('login');
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function getlist()
    {
        $user = account::orderBy('id')->paginate(10);
        return view('page.users.list', ['account'=>$user]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = account::find($id);
        $user ->delete();
        return redirect('users/list')->with('thongbao', 'Bạn đã xóa tài khoản thành công.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param
     * @return \Illuminate\Http\Response
     */
    public function getThem()
    {
        $user = account::all();
        return view('page.users.add', ['account'=>$user]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function postThem(Request $request)
    {
        $this->validate($request, [
         'txtUname'=>'required',
         'txtFname'=>'required',
         'txtPass'=>'required|min:6|max:20',
         'txtEmail'=>'required|unique:users,email',
         'txtPhone'=>'required|min:8|max:12',
     ], [
         'txtUname.required'=>'Vui lòng nhập tên đăng nhập.',
         'txtFname.required'=>'Vui lòng nhập họ và tên.',
         'txtPass.required'=>'Vui lòng nhập mật khẩu.',
         'txtPass.min'=>'Mật khẩu phải có tối thiểu 6 ký tự.',
         'txtPass.max'=>'Mật khẩu tối đa là 20 ký tự.',
         'txtEmail.required'=>'Vui lòng nhập email.',
         'txtEmail.unique'=>'Email này đã tồn tại.',
         'txtPhone.required'=>'Vui lòng nhập số điện thoại.',
         'txtPhone.min'=>'Số điện thoại này không hợp lệ.',
         'txtPhone.max'=>'Số điện thoại này không hợp lệ.',
     ]);

        $user = new account();
        $user->username = $request->txtUname;
        $user->fullname = $request->txtFname;
        $user->password = Hash::make($request->txtPass);
        $user->user_api = $request->txtApiU;
        $user->user_pass = $request->txtApiP;
        $user->email = $request->txtEmail;
        $user->phone = $request->txtPhone;
        $user->company = $request->txtCompa;
        $user->address = $request->txtAddress;
        $user->limit_sms = $request->txtLimit;
        $user->status = $request->status;
        $user->role = $request->role;
        $user->save();
        return redirect('users/list')->with('thongbao', 'Thêm tài khoản thành công.');
    }

    public function getSua($id)
    {
        $user = account::find($id);
        return view('page/users/edit', ['account'=>$user]);
    }

    public function postSua(Request $request, $id)
    {
        $this->validate($request, [
          'txtFname'=>'required',
          'txtEmail'=>'required',
          'txtPhone'=>'required|min:8|max:12',
      ], [
          'txtFname.required'=>'Vui lòng nhập họ và tên.',
          'txtEmail.required'=>'Vui lòng nhập email.',
          'txtPhone.required'=>'Vui lòng nhập số điện thoại.',
          'txtPhone.min'=>'Số điện thoại không hợp lệ.',
          'txtPhone.max'=>'Số điện thoại không hợp lệ.',
      ]);

        $user = account::find($id);
        $user->username = $request->txtUname;
        $user->fullname = $request->txtFname;
        // Kiểm tra có tồn tại hay không.
        if (isset($request->txtPass)) {
            $user->password = Hash::make($request->txtPass);
        }
        $user->user_api = $request->txtApiU;
        $user->user_pass = $request->txtApiP;
        $user->email = $request->txtEmail;
        $user->phone = $request->txtPhone;
        $user->company = $request->txtCompa;
        $user->address = $request->txtAddress;
        $user->limit_sms = $request->txtLimit;
        $user->status = $request->status;
        $user->role = $request->role;
        $user->save();
        return redirect('users/list')->with('thongbao', 'Cập nhật tài khoản thành công.');
    }

    public function searchu(Request $request)
    {
        $key = $request->get('key');
        if ($key != null) {
            $user = account::orderBy('id')->where('username', 'like', '%'.$key.'%')->orWhere('email', 'like', '%'.$key.'%')->orWhere('phone', 'like', '%'.$key.'%')->paginate(10);
            return view('page.users.list', ['account'=>$user]);
        } else {
            return redirect('users/list');
        }
    }

    public function getInfo()
    {
        $users = Auth::user();
        return view('page/users/profile', ['account'=>$users]);
    }
    public function postInfo(Request $request)
    {
        $user = Auth::user();
        $user->fullname = $request->txtFname;
        if (isset($request->txtPass)) {
            $this->validate($request, [
                'txtPass' => 'min:6',
                'newpass' => 'string|min:6',
            ], [
                'txtPass.min'=>'Mật khẩu hiện tại phải ít nhất 6 ký tự.',
                'newpass.min'=>'Mật khẩu mới phải có ít nhất 6 ký tự.'
            ]);
            if (!Hash::check($request->get('txtPass'), Auth::user()->password)) {
                return redirect()->back()->with('thongbao', 'Mật khẩu hiện tại của bạn không trùng khớp. Vui lòng thử lại.');
            }
            if ($request->newpass) {
                $user->password = Hash::make($request->newpass);
            }
        }
        $user->save();
        return redirect()->back()->with('thongbao', 'Cập nhật thông tin thành công.');
    }
}
