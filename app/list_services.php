<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class list_services extends Model
{
    protected $table = "list_services";

    public function templates(){
      return $this->belongsTo('App\templates','templates_id','id');
    }
}
