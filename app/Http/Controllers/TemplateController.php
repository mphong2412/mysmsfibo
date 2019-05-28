<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\templates;
use App\list_services;
use Validator;

class TemplateController extends Controller
{
    /**
    * Xoa template
    * @param $id
    * @return array || json
    */
    public function getXoa($id){
      $templates = templates::find($id);
      $templates->delete();
      return redirect('templates')->with('thongbao','Xóa thành công');
   }

 //
   public function getSua($id){
       $services = list_services::all();
       $templates = templates::find($id);
       return view('page/templates/sua',['templates'=>$templates,'list_services'=>$service]);
   }
 public function postSua(Request $request ,$id){
     $this->validate($request,
         [
           'txtService' => 'required ',
           'txtTemplate' =>'required ',
         ]);

     $templates = templates::find($id);
     $templates->service = $request->txtService;
     $templates->template= $request->txtTemplate;
     $templates->save();

     return redirect('templates')->with('thongbao','Sửa thành công');
 }

 // thêm template
 public function getThem(){
    $templates = templates::all();
    $services = list_services::all();
    return view('page/templates/them',['templates'=>$templates,'list_services'=>$services]);
 }
 public function postThem(Request $request){
    $this->validate($request,
     [
         'txtService' => 'required ',
         'txtTemplate' =>'required|unique:templates,template',
     ],[
         'txtService.required'=>'Please enter the service.',
         'txtTemplate.required'=>'Please enter the template.',
         'txtTemplate.unique'=>'Template already exits. ',
     ]);

     $templates = new templates();
     $templates->service = $request->txtService;
     $templates->template = $request->txtTemplate;
     $templates->save();
     return redirect('templates')->with('thongbao','Bạn đã thêm thành công');
 }

 public function searcht(Request $request)
 {
     $searcht = $request->get('key');
     $templates = templates::orderBy('id')->where('service','like','%'.$searcht.'%')->paginate(10);
     $templates = templates::orderBy('id')->where('template','like','%'.$searcht.'%')->paginate(10);
     return view('page.templates',compact('templates'));
 }

}
