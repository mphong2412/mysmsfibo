<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactGroups extends Model
{
    protected $table = "contact_groups";

    public function contacts(){
      return $this->hasMany('App\contacts','contact_groups_id','id');
    }

    public function composes(){

    }

}
