<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\contact_groups;
use validator;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getGroup()
    {
        $groups = contact_groups::orderBy('id')->paginate(10);
        return view('page.group', compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getThem()
    {
        $groups = contact_groups::all();
        return view('page/groups/add');
    }
    public function postThem(Request $request)
    {
        $this->validate(
           $request,
           [
            'txtGroup' => 'required |unique:contact_groups,name',
        ],
           [
            'txtGroup.required' => 'Please enter group name.',
            'txtGroup.unique' => 'This name has already exists.',
        ]
       );

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
        $searchg = $request->get('key');
        if ($searchg != null) {
            $groups= contact_groups::orderBy('id')->where('name', 'like', '%'.$searchg.'%')->paginate(10);
            return view('page.group', compact('groups'));
        } else {
            return redirect('group');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getSua($id)
    {
        $groups = contact_groups::find($id);
        return view('page/groups/edit', ['contact_groups'=>$groups]);
    }
    public function postSua(Request $request, $id)
    {
        $this->validate(
           $request,
           [
            'txtGroup' => 'required ',
        ],
           [
            'txtGroup.require'=>'Please enter the group name.',
        ]
       );

        $groups = contact_groups::find($id);
        $groups->name = $request->txtGroup;
        $groups->description = $request->txtDesc;
        $groups->save();
        return redirect('group')->with('thongbao', 'Sửa thành công');
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
        $groups = contact_groups::find($id);
        $groups->delete();
        return redirect('group')->with('thongbao', 'Xóa thành công');
    }
}
