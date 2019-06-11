<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\templates;
use App\list_services;
use Validator;
use App\notices;

class TemplateController extends Controller
{
    /**
    * Xoa template
    * @param $id
    * @return array || json
    */
    public function getXoa($id)
    {
        $templates = templates::find($id);
        $templates->delete();
        return redirect('templates')->with('thongbao', 'Xóa thành công');
    }

    //
    public function getSua($id)
    {
        $notices = notices::all();
        $services = list_services::all();
        $templates = templates::find($id);
        return view('page/templates/sua', ['templates'=>$templates,'list_services'=>$services,'notices'=>$notices]);
    }
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
        $templates->save();

        return redirect('templates')->with('thongbao', 'Cập nhật thành công');
    }

    // thêm template
    public function getThem()
    {
        $notices = notices::all();
        $templates = templates::all();
        $services = list_services::all();
        return view('page/templates/them', ['templates'=>$templates,'list_services'=>$services,'notices'=>$notices]);
    }
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
        $templates->save();
        return redirect('templates')->with('thongbao', 'Thêm thành công');
    }

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
}
