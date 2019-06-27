<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\contact_groups;
use validator;
use App\notices;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getGroup()
    {
        $notices = notices::all();
        $groups = contact_groups::orderBy('id')->paginate(10);
        return view('page.group', compact('groups', 'notices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getThem()
    {
        $notices = notices::all();
        $groups = contact_groups::all();
        return view('page/groups/add', compact('notices'));
    }
    public function postThem(Request $request)
    {
        $this->validate($request, [
            'txtGroup' => 'required |unique:contact_groups,name',
        ], [
            'txtGroup.required' => 'Please enter group name.',
            'txtGroup.unique' => 'This name has already exists.',
        ]);

        $groups = new contact_groups();
        $groups->name = $request->txtGroup;
        $groups->description = $request->txtDesc;
        $groups->save();
        return redirect('group')->with('thongbao', 'Bạn đã thêm thành công');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function searchg(Request $request)
    {
        $notices = notices::all();
        $searchg = $request->get('key');
        if ($searchg != null) {
            $groups= contact_groups::orderBy('id')->where('name', 'like', '%'.$searchg.'%')->paginate(10);
            return view('page.group', compact('groups', 'notices'));
        } else {
            return redirect('group');
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
        $groups = contact_groups::find($id);
        return view('page/groups/edit', ['contact_groups'=>$groups,'notices'=>$notices]);
    }
    public function postSua(Request $request, $id)
    {
        $this->validate($request, [
            'txtGroup' => 'required ',
        ], [
            'txtGroup.require'=>'Please enter the group name.',
        ]);
        $groups = contact_groups::find($id);
        $groups->name = $request->txtGroup;
        $groups->description = $request->txtDesc;
        $groups->save();
        return redirect('group')->with('thongbao', 'Sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $groups = contact_groups::find($id);
        $groups->delete();
        return redirect('group')->with('thongbao', 'Xóa thành công');
    }
}
