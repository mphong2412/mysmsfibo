<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\contacts;
use App\contact_groups;
use App\city;
use App\Imports\ContactsImport;
use Excel;
use App\Exports\ContactsExport;
use App\notices;
use Illuminate\Support\Facades\Auth;
use App\account;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notices = notices::all();
        $groups = contact_groups::all();
        $contact = contacts::orderBy('id')->paginate(10);
        $a = Auth::user()->username;
        if (Auth::user()->role == 2) {
            $contact = contacts::orderBy('id')->where('created_by', $a)->paginate(10);
        }
        if (Auth::user()->role == 3) {
            $contact = contacts::orderBy('id')->where('created_by', $a)->paginate(10);
        }
        return view('page.contacts.list', ['contacts'=>$contact,'contact_groups'=>$groups,'notices'=>$notices]);
    }


    /**
     * Show the form for editting resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getSua($id)
    {
        $notices = notices::all();
        $contact = contacts::find($id);
        $groups = contact_groups::all();
        $city = city::all();
        return view('page/contacts/edit', ['contacts'=>$contact,'contact_groups'=>$groups,'city'=>$city,'notices'=>$notices]);
    }
    /**
     * Cập nhật thông tin vào database
     * @param  Request $request
     * @param   $id
     * @return \Illuminate\Http\Response
     */
    public function postSua(Request $request, $id)
    {
        $this -> validate(
            $request,
            [
            'gname' => 'required',
            'txtPhone' => 'required|min:8|max:11',
        ],
            [
            'gname.required'=>'Please choose groups.',
            'txtPhone.min'=>'This is an invalid phone number.',
            'txtPhone.max'=>'This is an invalid phone number.',
            'txtPhone.required'=>'Please enter your phone number.',
        ]
        );
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

        return redirect('contacts/list')->with('thongbao', 'Cập nhật thông tin thành công');
    }
    /**
     * [contactExport : xuất dữ liệu ra file excel]
     * @return \Illuminate\Http\Response
     */
    public function contactExport()
    {
        $contact = contacts::select('phone', 'full_name')->get();
        return Excel::download(new ContactsExport, 'contacts.xlsx');
    }
    /**
     * [contactImport description]
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function contactImport(Request $request)
    {
        $this->validate($request, [
            'input1'=>'required|mimes:xls,xlsx',
        ], [
            'input1.required'=>'Vui lòng chọn tập tin cần import.',
            'input1.mimes'=>'Tập tin không hợp lệ, chúng tôi hỗ trợ định dạng xlsx.',
        ]);

        if ($request->hasFile('input1')) {
            $path = $request->file('input1')->getRealPath();
            $data = Excel::import(new ContactsImport, $path);
            if (!empty($data)) {
                foreach ($data as $key => $value) {
                    $contact->phone = $value->phone;
                    $contact->full_name = $value->full_name;
                    $contact->contact_groups_id = $request->input('abc');
                    $contact->save();
                }
            }
        }
        return redirect('contacts/list')->with('thongbao', 'Import thông tin thành công');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function searchc(Request $request)
    {
        $groups = contact_groups::all();
        $notices = notices::all();
        $key = $request->get('key');
        if ($key != null) {
            $contact = contacts::orderBy('id')->where('phone', 'like', '%'.$key.'%')->orWhere('full_name', 'like', '%'.$key.'%')->paginate(10);
            return view('page.contacts.list', ['contacts'=>$contact,'notices'=>$notices,'contact_groups'=>$groups]);
        } else {
            return redirect('contacts/list');
        }
    }

    /**
     *
     * @param
     * @return \Illuminate\Http\Response
     */
    public function getThem()
    {
        $notices = notices::all();
        $groups = contact_groups::all();
        $contact = contacts::all();
        $city = city::all();
        return view('page/contacts/add', ['contact'=>$contact,'contact_groups'=>$groups,'city'=>$city,'notices'=>$notices]);
    }

    public function postThem(Request $request)
    {
        $this -> validate(
            $request,
            [
            'gname' => 'required',
            'txtPhone' => 'required|min:8|max:11',
        ],
            [
            'gname.required'=>'Please choose groups.',
            'txtPhone.min'=>'This is an invalid phone number.',
            'txtPhone.max'=>'This is an invalid phone number.',
            'txtPhone.required'=>'Please enter your phone number.',
        ]
        );
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
        return redirect('contacts/list')->with('thongbao', 'Bạn đã thêm danh bạ thành công.');
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
        return redirect('contacts/list')->with('thongbao', 'Xóa danh bạ thành công');
    }
}
