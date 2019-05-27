<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contacts extends Model
{
    protected $table = "contacts";

    public function contact_groups(){
      return $this->belongsTo('App\contact_groups','contact_groups_id','id');
    }
}
