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
         'txtUname.required'=>'Please enter your user name.',
         'txtFname.required'=>'Please enter your full name.',
         'txtPass.required'=>'Please enter your password.',
         'txtPass.min'=>'Password minimum 6 characters.',
         'txtPass.max'=>'Password maximum 20 characters.',
         'txtEmail.required'=>'Please enter your email.',
         'txtEmail.unique'=>'This email has already exists.',
         'txtPhone.required'=>'Please enter your phone number.',
         'txtPhone.min'=>'This phone number has invalid.',
         'txtPhone.max'=>'This phone number has invalid.',
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
        return redirect('users/list')->with('thongbao', 'Bạn đã thêm tài khoản thành công.');
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
          'txtFname.required'=>'Please enter your full name.',
          'txtEmail.required'=>'Please enter your email.',
          'txtPhone.required'=>'Please enter your phone number.',
          'txtPhone.min'=>'This phone number has invalid.',
          'txtPhone.max'=>'This phone number has invalid.',
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
        return redirect('users/list')->with('thongbao', 'Bạn đã cập nhật tài khoản thành công.');
    }

    public function searchu(Request $request)
    {
        $key = $request->get('key');
        $user = account::orderBy('id')->where('username', 'like', '%'.$key.'%')->orWhere('email', 'like', '%'.$key.'%')->orWhere('phone', 'like', '%'.$key.'%')->paginate(10);
        return view('page.users.list', ['account'=>$user]);
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
                'txtPass.min'=>'Your current password is less than 6 characters.',
                'newpass.min'=>'Your new password is less than 6 characters.'
            ]);
            if (!Hash::check($request->get('txtPass'), Auth::user()->password)) {
                return redirect()->back()->with('thongbao', 'Your current password does not matches with the password you provided. Please try again.');
            }
            if ($request->newpass) {
                $user->password = Hash::make($request->newpass);
            }
        }
        $user->save();
        return redirect()->back()->with('thongbao', 'ok nha hihi');
    }
}
