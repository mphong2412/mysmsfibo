<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contacts extends Model
{
    protected $table = "contacts";

    public function contact_groups(){
      return $this->belongsTo('App\contact_groups','contact_groups_id','id');

    }
    public function city(){
    return $this->hasMany('App\city','city_id','id');
    }
}
