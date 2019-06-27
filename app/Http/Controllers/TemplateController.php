<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Templates;
use App\Models\ListServices;
use Validator;
use App\Models\Notices;
use App\Models\Account;
use App\Models\UserHasTemplates;

class TemplateController extends Controller
{
    public function getTemplates()
    {
        $notices = Notices::all();
        $services = ListServices::all();
        $user = Account::all();
        $user_has_templates = UserHasTemplates::all();
        $templates = Templates::orderBy('id')->paginate(10);
        return view('page.templates.templates', ['templates'=>$templates,'notices'=>$notices,'user_has_templates'=>$user_has_templates,'account'=>$user]);
    }
    /**
    * Xoa template
    * @param $id
    * @return \Illuminate\Http\Response
    */
    public function getXoa($id)
    {
        $templates = Templates::find($id);
        $as = UserHasTemplates::where('template_id', $id)->delete();
        $as = UserHasTemplates::where('user_id', $id)->delete();
        $templates->delete();
        return view('page.templates.templates')->with('thongbao', 'Xóa thành công');
    }

    /**
     * [getSua description]
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function getSua($id)
    {
        $notices = Notices::all();
        $services = ListServices::all();
        $user = Account::all();
        $templates = Templates::find($id);
        $user_has_templates = UserHasTemplates::orderBy('id')->paginate(5);
        return view('page/templates/sua', ['templates'=>$templates,'list_services'=>$services,'notices'=>$notices,'user_has_templates'=>$user_has_templates,'account'=>$user]);
    }
    /**
     * [postSua description]
     * @param  Request $request [description]
     * @param   $id
     * @return \Illuminate\Http\Response
     */
    public function postSua(Request $request, $id)
    {
        $this->validate($request, [
           'txtService' => 'required ',
           'txtTemplate' =>'required ',
       ], [
           'txtService.required'=>'Vui lòng nhập dịch vụ.',
           'txtTemplate.required'=>'Vui lòng nhập mẫu tin.',
       ]);

        $templates = Templates::find($id);
        $templates->service = $request->txtService;
        $templates->template= $request->txtTemplate;
        $total_input = $request->get('total_input');
        $templates->save();
        for ($i = 0; $i < $total_input; $i++) {
            if (!empty($request->get('id_' . $i))) {
                $user_id = $request->get('id_' . $i);
                $this->saveU($templates->id, $user_id);
            }
        }
        return redirect('templates')->with('thongbao', 'Cập nhật thành công');
    }

    /**
     * [getThem description]
     * @return \Illuminate\Http\Response
     */
    public function getThem()
    {
        $user = Account::all();
        $notices = Notices::all();
        $templates = Templates::all();
        $services = ListServices::all();
        return view('page/templates/them', ['templates'=>$templates,'list_services'=>$services,'notices'=>$notices,'account'=>$user]);
    }
    /**
     * [postThem description]
     * @param  Request $request [description]
     * @return \Illuminate\Http\Response
     */
    public function postThem(Request $request)
    {
        $this->validate($request, [
         'txtService' => 'required ',
         'txtTemplate' =>'required|unique:templates,template',
        ], [
         'txtService.required'=>'Vui lòng nhập dịch vụ.',
         'txtTemplate.required'=>'Vui lòng nhập mẫu tin.',
         'txtTemplate.unique'=>'Mẫu tin này đã tồn tại. ',
        ]);
        $templates = new Templates();
        $templates->service = $request->txtService;
        $templates->template = $request->txtTemplate;
        $templates->status = $request->status;
        $templates->created_by=auth::user()->username;
        $total_input = $request->get('total_input');
        $templates->save();
        for ($i = 0; $i < $total_input; $i++) {
            if (!empty($request->get('id_' . $i))) {
                $user_id = $request->get('id_' . $i);
                $this->saveU($templates->id, $user_id);
            }
        }
        return redirect('templates')->with('thongbao', 'Thêm thành công');
    }

    /**
     * [searcht description]
     * @param  Request $request [description]
     * @return \Illuminate\Http\Response
     */
    public function searcht(Request $request)
    {
        $notices = Notices::all();
        $user_has_templates = UserHasTemplates::all();
        $searcht = $request->get('key');
        if ($searcht != null) {
            $templates = Templates::orderBy('id')->where('service', 'like', '%'.$searcht.'%')->orWhere('template', 'like', '%'.$searcht.'%')->paginate(10);
            return view('page.templates', compact('templates', 'notices', 'user_has_templates'));
        } else {
            return redirect('templates');
        }
    }

    /**
     * [modaltu description]
     * @param  Request $request [description]
     * @return \Illuminate\Http\Response
     */
    public function modaltu(Request $request)
    {
        $notices = Notices::all();
        $modaltu = $request->get('su');
        if ($modaltu != null) {
            $user = Account::orderBy('id')->where('username', 'like', '%'.$modaltu.'%')->paginate(5);
            return view('page/templates/them', ['account'=>$user,'notices'=>$notices]);
        } else {
            return redirect('templates/them');
        }
    }

    /**
     * [saveU description]
     * @param  [type] $id      [description]
     * @param  [type] $user_id [description]
     * @return [type]          [description]
     */
    public function saveU($id, $user_id)
    {
        $h = new UserHasTemplates;
        $h->template_id = $id;
        $h->user_id = $user_id;
        $h->save();
    }
}
