<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contact_groups extends Model
{
    protected $table = "contact_groups";

    public function contacts(){
      return $this->hasMany('App\contacts','contact_groups_id','id');
    }

    public function composes(){
      
    }

}
