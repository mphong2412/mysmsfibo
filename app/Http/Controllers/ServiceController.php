<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\list_services;
use App\templates;
use session;
use validator;
use App\account;
use App\notices;
use App\user_has_list_services;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getList()
    {
        $notices = notices::all();
        $service = list_services::orderBy('id')->paginate(10);
        return view('page.services', compact('service', 'notices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getadd()
    {
        $notices = notices::all();
        $template = templates::all();
        $services = list_services::all();
        $user = account::all();
        return view('page/services/add', ['templates'=>$template,'list_services'=>$services,'notices'=>$notices,'account'=>$user]);
    }

    public function postAdd(Request $request)
    {
        $this->validate(
            $request,
            [
            'txtName' => 'required|unique:list_services,name',
        ],
            [
            'txtName.require'=>'Vui lòng nhập thông tin.',
            'txtName.unique'=>'The service has already exists.',
        ]
       );

        $services = new list_services();
        $services->name = $request->txtName;
        $services->description = $request->txtDesc;
        $services->created_by=auth::user()->username;
        $total_input = $request->get('total_input');
        $services->save();
        for ($i = 0; $i < $total_input; $i++) {
            if (!empty($request->get('id_' . $i))) {
                $user_id = $request->get('id_' . $i);
                $this->saveS($services->id, $user_id);
            }
        }

        return redirect('services')->with('thongbao', 'Bạn đã thêm thành công');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function searchs(Request $request)
    {
        $notices = notices::all();
        $searchs = $request->get('key');
        if ($searchs != null) {
            $service = list_services::orderBy('id')->where('name', 'like', '%'.$searchs.'%')->paginate(10);
            return view('page.services', compact('service', 'notices'));
        } else {
            return redirect('services');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getSua($id)
    {
        $notices = notices::all();
        $services = list_services::find($id);
        $user = account::all();
        return view('page/services/edit', ['list_services'=>$services,'notices'=>$notices,'account'=>$user]);
    }
    public function postSua(Request $request, $id)
    {
        $this->validate(
            $request,
            [
           'txtName' => 'required ',
       ]
      );

        $services = list_services::find($id);
        $services->name = $request->txtName;
        $services->description = $request->txtDesc;
        $total_input = $request->get('total_input');
        $services->save();
        for ($i = 0; $i < $total_input; $i++) {
            if (!empty($request->get('id_' . $i))) {
                $user_id = $request->get('id_' . $i);
                $this->saveS($services->id, $user_id);
            }
        }

        return redirect('services')->with('thongbao', 'Sửa thành công');
    }

    /**
     * [saveS description]
     * @param  $id
     * @param  $user_id
     * @return [type]
     */
    public function saveS($id, $user_id)
    {
        $s = new user_has_list_services;
        $s->service_id = $id;
        $s->user_id = $user_id;
        $s->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = list_services::find($id);
        $a = user_has_list_services::where('service_id', $id)->delete();
        $service->delete();
        return redirect('services')->with('thongbao', 'Xóa thành công');
    }

    /**
     * [modaltu description]
     * @param  Request $request [description]
     * @return [type]           [description]
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
}
