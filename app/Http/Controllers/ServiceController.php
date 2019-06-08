<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\list_services;
use App\templates;
use session;
use validator;
use App\notices;

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
        return view('page/services/add', ['templates'=>$template,'list_services'=>$services,'notices'=>$notices]);
    }

    public function postAdd(Request $request)
    {
        $this->validate(
            $request,
            [
            'txtName' => 'required|unique:list_services,name',
        ],
            [
            'txtName.unique'=>'The service has already exists.',
        ]
       );

        $services = new list_services();
        $services->name = $request->txtName;
        $services->description = $request->txtDesc;
        $services->save();
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
        $searchs = $request->get('key');
        if ($searchs != null) {
            $service = list_services::orderBy('id')->where('name', 'like', '%'.$searchs.'%')->paginate(10);
            return view('page.services', compact('service'));
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
        return view('page/services/edit', ['list_services'=>$services,'notices'=>$notices]);
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
        $services->save();
        return redirect('services')->with('thongbao', 'Sửa thành công');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
        $service->delete();
        return redirect('services')->with('thongbao', 'Xóa thành công');
    }
}
