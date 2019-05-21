<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\templates;
use App\list_services;

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
       // // $list_services = list_services::all();
       // $templates = templates::find($id);
       // return view('page.edittemp' ,['template'=>$templates]);
       return view('page.templates.sua');
   }
 public function postSua(Request $request ,$id){
     // $this->validate($request,
     //     [
     //         'services' => 'required|min:3',
     //
     //     ],[
     //         'services.required'=>'Bạn chưa nhập tên',
     //         'services.unique'=>'Tên đã tồn tại',
     //         'services.min'=>'Tên phải có 3 ký tự'
     //     ]);
     //
     // $templates = templates::find($id);
     // $templates->id_list_services = $request->list_services;
     // $templates->service = $request->service;
     // $templates->template =  $request->template;
     // $templates->save();
     //
     // return redirect('page.edittemp'.$id)->with('thongbao','Sửa thành công');
 }

 // thêm template
 public function getThem(){
     $list_services= list_services::all();
     $templates = templates::all();
     return view('page.templates.them');
 }
 public function postThem(Request $request){
        echo $request->Service;
    // $this->validate($request,
    //  [
    //      'Service' => 'required | min: 1',
    //      'Template' =>'required',
    //  ],[
    //      'Service.required'=>'Bạn chưa nhập tên',
    //      'Service.unique'=>'Tên đã tồn tại',
    //      'Service.min'=>'Tên phải từ 3 ký tự',
    //      'Template.required'=>'Bạn chưa nhập thông tin',
    //  ]);
    //
    //  $templates = new Product;
    //  $templates->Service = $request->services;
    //  $templates->Template = $request->templates;
    //  $products->save();
    //  return redirect('page.addtemp')->with('thongbao','Bạn đã thêm thành công');
 }
}
