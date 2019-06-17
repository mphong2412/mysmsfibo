<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user_has_list_services extends Model
{
    protected $table = "user_has_list_services";

    public function list_services()
    {
        return $this->hasMany('App\list_services', 'service_id', 'id');
    }

    public function account()
    {
        return $this->hasMany('App\account', 'user_id', 'id');
    }
}
