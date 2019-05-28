<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\contacts;
use App\contact_groups;
use App\city;
use App\Imports\ContactsImport;
use Excel;
use App\Exports\ContactsExport;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = contact_groups::all();
        $contact = contacts::orderBy('id')->paginate(10);
        return view('page.contacts.list',['contacts'=>$contact,'contact_groups'=>$groups]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getSua($id)
    {
        $contact = contacts::find($id);
        $groups = contact_groups::all();
        $city = city::all();
        return view('page/contacts/edit',['contacts'=>$contact,'contact_groups'=>$groups,'city'=>$city]);
    }

    public function postSua(Request $request ,$id){
        $this -> validate($request,
        [
            'gname' => 'required',
            'txtPhone' => 'required|min:8|max:11',
        ],[
            'gname.required'=>'Please choose groups.',
            'txtPhone.min'=>'This is an invalid phone number.',
            'txtPhone.max'=>'This is an invalid phone number.',
            'txtPhone.required'=>'Please enter your phone number.',
        ]);
        $contact = contacts::find($id);
        $contact->contact_groups_id = $request->gname;
        $contact->phone = $request->txtPhone;
        $contact->full_name = $request->txtName;
        $contact->gender = $request->gender;
        $contact->email = $request->email;
        $contact->birthday = $request->doB;
        $contact->city_id = $request->city;
        $contact->address = $request->address;
        $contact->status = $request->status;
        $contact->save();

        return redirect('contacts/list')->with('thongbao','Cập nhật thông tin thành công');
    }

    public function contactExport(){
        $contact = contacts::select('phone','full_name')->get();
        return Excel::download(new ContactsExport,'data.xlsx');
    }

    public function ContactsImport(Request $request){
        if($request->hasFile('file')){
            $path = $request->file('file')->getRealPath();
            $data = Excel::import($path,function($reader){})->get();
                if(!empty($data) && $data->count()){
                    foreach ($data as $key => $value) {
                        $contact = new contacts();
                        $contact->phone = $value->phone;
                        $contact->name = $value->name;
                        $contact->save();
                    }
                }
        }
        return back();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function searchc(Request $request)
     {
         $key = $request->get('key');
         $contact = contacts::orderBy('id')->where('phone','like','%'.$key.'%')->paginate(10);
         $contact = contacts::orderBy('id')->where('full_name','like','%'.$key.'%')->paginate(10);
         return view('page.contacts.list',['contacts'=>$contact]);
     }

    /**
     *
     * @param
     * @return \Illuminate\Http\Response
     */
    public function getThem()
    {
        $groups = contact_groups::all();
        $contact = contacts::all();
        $city = city::all();
        return view('page/contacts/add',['contact'=>$contact,'contact_groups'=>$groups,'city'=>$city]);
    }

    public function postThem(Request $request){
        $this -> validate($request,
        [
            'gname' => 'required',
            'txtPhone' => 'required|min:8|max:11',
        ],[
            'gname.required'=>'Please choose groups.',
            'txtPhone.min'=>'This is an invalid phone number.',
            'txtPhone.max'=>'This is an invalid phone number.',
            'txtPhone.required'=>'Please enter your phone number.',
        ]);
        $contact = new contacts();
        $contact->contact_groups_id = $request->gname;
        $contact->phone = $request->txtPhone;
        $contact->full_name = $request->txtName;
        $contact->gender = $request->gender;
        $contact->email = $request->email;
        $contact->birthday = $request->doB;
        $contact->city_id = $request->city;
        $contact->address = $request->address;
        $contact->status = $request->status;
        $contact->save();
        return redirect('contacts/list')->with('thongbao','Bạn đã thêm danh bạ thành công.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = contacts::find($id);
        $contact->delete();
        return redirect('contacts/list')->with('thongbao','Xóa danh bạ thành công');
    }
}
