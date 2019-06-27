<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use session;
use validator;
use App\Models\ListServices;
use App\Models\Templates;
use App\Models\Account;
use App\Models\Notices;
use App\Models\UserHasListServices;

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
        $notices = Notices::all();
        $service = ListServices::orderBy('id')->paginate(10);
        $user = Account::all();
        $user_has_list_services = UserHasListServices::all();
        return view('page.services.services', compact('service', 'notices', 'user_has_list_services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getadd()
    {
        $notices = Notices::all();
        $template = Templates::all();
        $services = ListServices::all();
        $user = Account::all();
        return view('page/services/add', ['templates'=>$template,'list_services'=>$services,'notices'=>$notices,'account'=>$user]);
    }

    public function postAdd(Request $request)
    {
        $this->validate($request, [
            'txtName' => 'required|unique:list_services,name',
        ], [
            'txtName.require'=>'Vui lòng nhập thông tin.',
            'txtName.unique'=>'The service has already exists.',
        ]);
        $services = new ListServices();
        $services->name = $request->txtName;
        $services->description = $request->txtDesc;
        $services->created_by = auth::user()->username;
        $total_input = $request->get('total_input');
        $services->save();
        for ($i = 0; $i < $total_input; $i++) {
            if (!empty($request->get('id_' . $i))) {
                $user_id = $request->get('id_' . $i);
                $this->saveS($services->id, $user_id);
            }
        }

        return redirect('manage-services')->with('thongbao', 'Bạn đã thêm thành công');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function searchs(Request $request)
    {
        $notices = Notices::all();
        $user_has_list_services  = UserHasListServices::all();
        $searchs = $request->get('key');
        if ($searchs != null) {
            $service = ListServices::orderBy('id')->where('name', 'like', '%'.$searchs.'%')->paginate(10);
            return view('manage-services', compact('service', 'notices', 'user_has_list_services'));
        } else {
            return redirect('manage-services');
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
        $notices = Notices::all();
        $services = ListServices::find($id);
        $user = Account::all();
        $user_has_list_services = UserHasListServices::orderBy('id')->paginate(5);
        return view('page/services/edit', ['list_services'=>$services,'notices'=>$notices,'account'=>$user,'user_has_list_services'=>$user_has_list_services]);
    }
    public function postSua(Request $request, $id)
    {
        $this->validate($request, [
           'txtName' => 'required ',
       ]);

        $services = ListServices::find($id);
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

        return redirect('manage-service')->with('thongbao', 'Sửa thành công');
    }

    /**
     * [saveS description]
     * @param  $id
     * @param  $user_id
     * @return [type]
     */
    public function saveS($id, $user_id)
    {
        $s = new UserHasListServices;
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
        $service = ListServices::find($id);
        $a = UserHasListServices::where('service_id', $id)->delete();
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
        $notices = Notices::all();
        $modaltu = $request->get('su');
        if ($modaltu != null) {
            $user = Account::orderBy('id')->where('username', 'like', '%'.$modaltu.'%')->paginate(5);
            return view('page/services/them', ['account'=>$user,'notices'=>$notices]);
        } else {
            return redirect('services/them');
        }
    }
}
