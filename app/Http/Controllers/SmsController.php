<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\Services\SmsService;

use App\Models\Templates;
use App\Models\Contacts;
use App\Models\ContactGroups;
use App\Models\ListServices;
use App\Models\UserHasTemplates;
use App\Models\Notices;

class SmsController extends Controller
{
    public function __construct(SmsService $smsService)
    {
        $this->middleware('auth');
        $this->smsService = $smsService;
    }

    public function getIndex()
    {
        $a = Session::get('key_function');
        $notices = Notices::all();
        return view('layouts.base', ['notices'=>$notices]);
    }

    public function getCompose()
    {
        $iduser = Auth()->id();
        $notices = Notices::all();
        $contact = Contacts::all();
        $group = $this->smsService->getGroup($iduser);
        $value = Input::get('groupcontact');
        $contact_list = $this->smsService->getContactGroup($value);
        $template = $this->smsService->getTemplate($iduser);
        $service = $this->smsService->getService($iduser);

        return view('page.sms.compose', ['phonegroup'=>$contact_list,'notices'=>$notices, 'group'=>$group,'service'=>$service,'template'=>$template]);
    }
}
