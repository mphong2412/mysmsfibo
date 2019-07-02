<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Citys extends Model
{
    protected $table = "city";

    public function contacts(){
      return $this->belongsTo('App\contacts','city_id','id');
    }
}
