<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

use App\Models\Templates;
use App\Models\Contacts;
use App\Models\ContactGroups;
use App\Models\ListServices;
use App\Models\UserHasTemplates;
use App\Models\Notices;
use DB;

class PageController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');
    }

    //check role and save session
    public function getIndex()
    {
        $notices = Notices::all();
        return view('page.dashboard.homepage', ['notices'=>$notices]);
    }



    public function getGroup() {
        $Notices = Notices::all();
        $contact = Contacts::all();
        $group = ContactGroups::all();
        $a = Auth::user()->username;
        if (Auth::user()->role == 2) {
            $group = ContactGroups::orderBy('id')->where('created_by', $a)->get();
        }
        if (Auth::user()->role == 3) {
            $group = ContactGroups::orderBy('id')->where('created_by', $a)->get();
        }
        $value = Input::get('groupcontact');

        $iduser = auth()->id();

        //Get danh sách service.....................
        $service = DB::table('user_has_list_services')
                  ->join('users', 'user_has_list_services.user_id', '=', 'users.id')
                  ->join('list_services','user_has_list_services.service_id', '=', 'list_services.id')
                  ->where('users.id', '=', $iduser)
                  ->select('list_services.name as name','list_services.id as id')->get();

        //Get danh sách template.....................
        $template = DB::table('user_has_templates')
                  ->join('users', 'user_has_templates.user_id', '=', 'users.id')
                  ->join('templates','user_has_templates.template_id', '=', 'templates.id')
                  ->where('users.id', '=', $iduser)
                  ->select('templates.template as name','templates.id as id')->get();

        //Get contact by id group....................
        $contact_list = DB::table('contact_groups')
                        ->join('contacts','contact_groups.id', '=', 'contacts.contact_groups_id')
                        ->where('contact_groups.id','=', $value)
                        ->select('contacts.phone','contacts.birthday','contacts.address','contacts.full_name as name')->get();
        return view('page.sms.compose', ['phonegroup'=>$contact_list,'notices'=>$Notices, 'group'=>$group,'service'=>$service,'template'=>$template]);
    }

    public function saveSMS(Request $request) {
      $composes = new Composes();
      $composes->created_by = Auth()->id();
      $composes->msg_content = $request->contentsms;
      $composes->msgcampaign_name = $request->campaignreview;
      $composes->service = $request->servicename;
      $composes->save();



    }
}
