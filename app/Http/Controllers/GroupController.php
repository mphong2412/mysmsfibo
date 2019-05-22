<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\contact_groups;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getGroup()
    {
        $groups = contact_groups::all();
        return view('page.group',compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getThem()
    {
        $groups = contact_groups::all();
        return view('page/groups');
    }
    public function postThem()
    {
      $this->validate($request,
       [
           'txtGroup' => 'required ',
           'txtDesc' =>'required ',
       ]);

       $groups = new contact_groups();
       $groups->name_group = $request->txtGroup;
       $groups->description = $request->txtDesc;
       $groups->save();
       return redirect()->back()->with('thongbao','Bạn đã thêm thành công');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        //
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
        //
    }
}
