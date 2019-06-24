<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\templates;
use App\list_services;
use Validator;
use App\notices;
use App\account;
use App\user_has_templates;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use DB;

class TemplateController extends Controller
{
    public function getTemplates()
    {
        $notices = notices::all();
        $service = list_services::all();
        $user = account::all();
        $user_has_templates = user_has_templates::all();
        $templates = templates::orderBy('id')->paginate(10);
        return view('page.templates', ['templates'=>$templates,'notices'=>$notices,'user_has_templates'=>$user_has_templates,'account'=>$user]);
    }
    /**
    * Xoa template
    * @param $id
    * @return \Illuminate\Http\Response
    */
    public function getXoa($id)
    {
        $templates = templates::find($id);
        $as = user_has_templates::where('template_id', $id)->delete();
        $templates->delete();
        return redirect('templates')->with('thongbao', 'Xóa thành công');
    }

    /**
     * [getSua description]
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function getSua($id)
    {
        $notices = notices::all();
        $services = list_services::all();
        $user = account::all();
        $templates = templates::find($id);
        $user_has_templates = user_has_templates::all();
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
        $this->validate(
            $request,
            [
           'txtService' => 'required ',
           'txtTemplate' =>'required ',
       ],
            [
           'txtService.required'=>'Vui lòng nhập dịch vụ.',
           'txtTemplate.required'=>'Vui lòng nhập mẫu tin.',
       ]
        );

        $templates = templates::find($id);
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
        $user = account::all();
        $notices = notices::all();
        $templates = templates::all();
        $services = list_services::all();
        return view('page/templates/them', ['templates'=>$templates,'list_services'=>$services,'notices'=>$notices,'account'=>$user]);
    }
    /**
     * [postThem description]
     * @param  Request $request [description]
     * @return \Illuminate\Http\Response
     */
    public function postThem(Request $request)
    {
        $this->validate(
            $request,
            [
         'txtService' => 'required ',
         'txtTemplate' =>'required|unique:templates,template',
        ],
            [
         'txtService.required'=>'Vui lòng nhập dịch vụ.',
         'txtTemplate.required'=>'Vui lòng nhập mẫu tin.',
         'txtTemplate.unique'=>'Mẫu tin này đã tồn tại. ',
        ]
        );
        $templates = new templates();
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
        $notices = notices::all();
        $searcht = $request->get('key');
        if ($searcht != null) {
            $templates = templates::orderBy('id')->where('service', 'like', '%'.$searcht.'%')->orWhere('template', 'like', '%'.$searcht.'%')->paginate(10);
            return view('page.templates', compact('templates', 'notices'));
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
        $notices = notices::all();
        $modaltu = $request->get('su');
        if ($modaltu != null) {
            $user = account::orderBy('id')->where('username', 'like', '%'.$modaltu.'%')->paginate(5);
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
        $h = new user_has_templates;
        $h->template_id = $id;
        $h->user_id = $user_id;
        $h->save();
    }
}
