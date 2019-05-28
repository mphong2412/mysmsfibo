<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class city extends Model
{
    protected $table = "city";

    public function contacts(){
      return $this->belongsTo('App\contacts','city_id','id');
    }
}
