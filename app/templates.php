<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class templates extends Model
{
    protected $table = "templates";
    
    public function services(){
      return $this->hasmany('App\list_services','templates_id','id');
    }
}
