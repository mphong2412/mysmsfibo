<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\account;
use App;
use DB;
use validator;
use App\Models\Notices;
use App\Models\ListFunction;
use App\Models\Authorization;
use App\ENums\User\ERoleUser;
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
        $notices = Notices::all();
        $user = Account::orderBy('id')->paginate(10);
        $a = Auth::user()->id;
        if (Auth::user()->role == 2) {
            $user = Account::where('created_by', $a)->paginate(10);
        }
        return view('page.users.list', ['account'=>$user,'notices'=>$notices]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Account::find($id);
        $au = Authorization::where('user_id', $id)->delete();
        $user->delete();
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
        $notices = Notices::all();
        $user = Account::all();
        $ab = ListFunction::all();
        return view('page.users.add', ['account'=>$user,'notices'=>$notices,'list_function'=>$ab]);
    }
    // lưu id của list_function
    public function funct()
    {
        $func = ListFunction::select('id', 'function_name')->get();
        return $func;
    }

    // lưu thông tin vào authorization
    public function saveAu($id, $function_id) //truyền vào id,function_id
    {
        $aut = new Authorization;
        $aut->user_id = $id;
        $aut->function_id = $function_id;
        $aut->save();
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
         'txtUname' => 'required|unique:users,username',
         'txtFname' => 'required',
         'txtPass' => 'required|min:6|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
         'txtEmail' => 'required|unique:users,email',
         'txtPhone' => array('required','digits:10','regex:/((09|03|07|08|05)+([0-9]{8})\b)/'),
     ], [
         'txtUname.required' => 'Vui lòng nhập tên đăng nhập.',
         'txtUname.unique' => 'Tài khoản đã tồn tại.',
         'txtFname.required' => 'Vui lòng nhập họ và tên.',
         'txtPass.required' => 'Vui lòng nhập mật khẩu.',
         'txtPass.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
         'txtPass.regex' => 'Mật khẩu phải chứa ít nhất 1 ký tự đặc biệt, 1 ký tự số, 1 ký tự in hoa, 1 ký tự thường.',
         'txtEmail.required' => 'Vui lòng nhập email.',
         'txtEmail.unique' => 'Email này đã tồn tại.',
         'txtPhone.required' => 'Vui lòng nhập số điện thoại.',
         'txtPhone.digits' => 'Số điện thoại không hợp lệ.',
         'txtPhone.regex' => 'Số điện thoại này không hợp lệ. Ví dụ : 0901861911',
     ]);

        $user = new Account();
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
        $user->created_by=auth::user()->id;
        $user->save();
        $listFunction = $this->funct();
        foreach ($listFunction as $key => $value) {
            if ($request->role == 1) {
                $this->saveAu($user->id, $value->id);
            } elseif ($request->role == 2) {
                if ($value->function_name == 'noticeconfig') {
                    continue;
                }
                $this->saveAu($user->id, $value->id);
            } elseif ($request->role == 3) {
                if ($value->function_name == 'noticeconfig' || $value->function_name == 'userconfig') {
                    continue;
                }
                $this->saveAu($user->id, $value->id);
            }
        }
        return redirect('users/list')->with('thongbao', 'Thêm tài khoản thành công.');
    }

    public function getSua($id)
    {
        $notices = Notices::all();
        $user = Account::find($id);
        return view('page/users/edit', ['account'=>$user,'notices'=>$notices]);
    }

    public function postSua(Request $request, $id)
    {
        $this->validate($request, [
          'txtFname'=>'required',
          'txtEmail'=>'required',
          'txtPhone' => array('required','digits:10','regex:/((09|03|07|08|05)+([0-9]{8})\b)/'),
      ], [
          'txtFname.required'=>'Vui lòng nhập họ và tên.',
          'txtEmail.required'=>'Vui lòng nhập email.',
          'txtPhone.required'=>'Vui lòng nhập số điện thoại.',
          'txtPhone.min'=>'Số điện thoại không hợp lệ.',
          'txtPhone.max'=>'Số điện thoại không hợp lệ.',
          'txtPhone.required' => 'Vui lòng nhập số điện thoại.',
          'txtPhone.digits' => 'Số điện thoại không hợp lệ.',
          'txtPhone.regex' => 'Số điện thoại này không hợp lệ. Ví dụ : 0901861911',
      ]);

        $user = Account::find($id);
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
        // $user->role = $request->role;
        $user->save();
        return redirect('users/list')->with('thongbao', 'Cập nhật tài khoản thành công.');
    }

    public function searchu(Request $request)
    {
        $notices = Notices::all();
        $key = $request->get('key');
        if ($key != null) {
            $user = Account::orderBy('id')->where('username', 'like', '%'.$key.'%')->orWhere('email', 'like', '%'.$key.'%')->orWhere('phone', 'like', '%'.$key.'%')->paginate(10);
            return view('page.users.list', ['account'=>$user,'notices'=>$notices]);
        } else {
            return redirect('users/list');
        }
    }

    public function getInfo()
    {
        $notices = Notices::all();
        $users = Auth::user();
        return view('page/users/profile', ['account'=>$users,'notices'=>$notices]);
    }
    public function postInfo(Request $request)
    {
        $user = Auth::user();
        $user->fullname = $request->txtFname;
        $user->email = $request->txtEmail;
        if (isset($request->txtPass)) {
            $this->validate($request, [
                'txtPass' => 'min:6',
                'newpass' => 'string|min:6|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
            ], [
                'txtPass.min'=>'Mật khẩu hiện tại phải ít nhất 6 ký tự.',
                'newpass.min'=>'Mật khẩu mới phải có ít nhất 6 ký tự.',
                'newpass.regex'=> 'Mật khẩu phải chứa ít nhất 1 ký tự đặc biệt, 1 ký tự số, 1 ký tự in hoa, 1 ký tự thường.',
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
