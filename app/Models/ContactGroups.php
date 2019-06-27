<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactGroups extends Model
{
    protected $table = "contact_groups";

    public function Contacts()
    {
        return $this->hasMany('App\Models\Contacts', 'contact_groups_id', 'id');
    }
}
