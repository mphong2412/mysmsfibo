<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\contacts;
use App\contact_groups;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = contact_groups::all();
        $contact = contacts::all();
        return view('page.contacts.list',['contacts'=>$contact,'contact_groups'=>$groups]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function searchc(Request $request)
     {
         $key = $request->get('key');
         $contact = contacts::orderBy('id')->where('phone','like','%'.$key.'%')->paginate(10);
         $contact = contacts::orderBy('id')->where('full_name','like','%'.$key.'%')->paginate(10);
         return view('page.contacts.list',['contacts'=>$contact]);
     }

    /**
     * Display the specified resource.
     *
     * @param
     * @return \Illuminate\Http\Response
     */
    public function getThem()
    {
        $groups = contact_groups::all();
        $contact = contacts::all();
        return view('page/contacts/add',['contact'=>$contact,'contact_groups'=>$groups]);
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
