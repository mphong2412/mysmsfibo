<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notices;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notices = Notices::orderBy('id', 'desc')->paginate(5);
        return view('page.notices', ['notices'=>$notices]);
    }

    /**
     *
     * @param
     * @return \Illuminate\Http\Response
     */
    public function getThem()
    {
        $notices = Notices::all();
        return view('notices', ['notices'=>$notices]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postThem(Request $request)
    {
        $this->validate($request, [
            'status'=>'required',
        ]);
        $notices = new Notices();
        if (isset($request->txtNotice)) {
            $notices->name = $request->txtNotice;
            $notices->status = $request->status;
            $notices->save();
            return redirect('notification')->with('thongbao', 'Cập nhật thông báo thành công.');
        } else {
            return redirect('notification');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $notices = Notices::find($id);
        $notices->delete();
        return redirect('notification')->with('thongbao', 'Xóa thành công.');
    }
}
