<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\notices;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notices = notices::all();
        return view('page.notices');
    }

    /**
     *
     * @param
     * @return \Illuminate\Http\Response
     */
    public function getThem()
    {
        $notice = notices::all();
        return view('page/notices',['notices'=>$notices]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postThem(Request $request)
    {
        $notices = new notices();
        $notices->notice = $request->txtNotice;
        $notices->save();
        return view('page/notices')->with('thongbao','Hiển thị thành công.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
