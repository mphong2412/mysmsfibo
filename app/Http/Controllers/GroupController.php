<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use validator;
use App\Models\ContactGroups;
use App\Models\Notices;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getGroup()
    {
        $notices = Notices::all();
        $groups = ContactGroups::orderBy('id')->paginate(10);
        $a = Auth::user()->id;
        if (Auth::user()->role == 2) {
            $groups = ContactGroups::orderBy('id')->where('created_by', $a)->paginate(10);
        }
        if (Auth::user()->role == 3) {
            $groups = ContactGroups::orderBy('id')->where('created_by', $a)->paginate(10);
        }
        return view('page.groups.group', compact('groups', 'notices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getThem()
    {
        $notices = Notices::all();
        $groups = ContactGroups::all();
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

        $groups = new ContactGroups();
        $groups->name = $request->txtGroup;
        $groups->description = $request->txtDesc;
        $groups->created_by = auth::user()->id;
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
        $notices = Notices::all();
        $searchg = $request->get('key');
        if ($searchg != null) {
            $groups= ContactGroups::orderBy('id')->where('name', 'like', '%'.$searchg.'%')->paginate(10);
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
        $notices = Notices::all();
        $groups = ContactGroups::find($id);
        return view('page/groups/edit', ['contact_groups'=>$groups,'notices'=>$notices]);
    }
    public function postSua(Request $request, $id)
    {
        $this->validate($request, [
            'txtGroup' => 'required ',
        ], [
            'txtGroup.require'=>'Please enter the group name.',
        ]);
        $groups = ContactGroups::find($id);
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
        $groups = ContactGroups::find($id);
        $groups->delete();
        return redirect('group')->with('thongbao', 'Xóa thành công');
    }
}
