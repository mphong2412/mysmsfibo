<?php

namespace App\Repositories;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

use App\Models\ContactGroups;
use App\Models\Contacts;
use App\Models\Notices;
use App\Models\ListServices;
use App\Models\Templates;
use App\Models\Users;


class SmsRepository {
	public function __construct(Users $users, ContactGroups $contactgroup, Contacts $contact, Notices $notices ,ListServices $services, Templates $templates) {
        $this->contactgroup = $contactgroup;
        $this->contact = $contact;
				$this->notices = $notices;
        $this->services = $services;
				$this->templates = $templates;
				$this->users = $users;
    }

		public function getContactGroup($value) {
				try {
					$contact_list = DB::table('contact_groups')
		                      ->join('contacts','contact_groups.id', '=', 'contacts.contact_groups_id')
		                      ->where('contact_groups.id','=', $value)
		                      ->select('contacts.phone','contacts.birthday','contacts.address','contacts.full_name as name')->get();
					return $contact_list;
				} catch (\Exception $e) {
					logger("Failed to get ContactGroups. contact_group_ids " .  $value . " message: " . $e->getMessage());
					return null;
				}
		}

    public function getTemplate($iduser) {
				try {
          $template = DB::table('user_has_templates')
                    ->join('users', 'user_has_templates.user_id', '=', 'users.id')
                    ->join('templates','user_has_templates.template_id', '=', 'templates.id')
                    ->where('users.id', '=', $iduser)
                    ->select('templates.template as name','templates.id as id')->get();
					return $template;
				} catch (\Exception $e) {
					logger("Failed to get Templates. template_id " . $iduser . " message:" . $e->getMessage());
					return null;
				}
		}

    public function getService($iduser) {
				try {
          $service = DB::table('user_has_list_services')
                    ->join('users', 'user_has_list_services.user_id', '=', 'users.id')
                    ->join('list_services','user_has_list_services.service_id', '=', 'list_services.id')
                    ->where('users.id', '=', $iduser)
                    ->select('list_services.name as name','list_services.id as id')->get();
					return $service;
				} catch (\Exception $e) {
					logger("Failed to get Services. service_id " . $iduser . " message:" . $e->getMessage());
					return null;
				}
		}

		public function getGroup($iduser) {
			try {
				$group = ContactGroups::orderBy('id')->where('created_by', $iduser)->get();
				return $group;
			} catch (\Exception $e) {
				logger("Failed to get contact_groups_id.  " . $iduser . " message:" . $e->getMessage());
				return null;
			}
		}
}
