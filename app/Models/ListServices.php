<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ListServices extends Model
{
    protected $table = "list_services";

    public function Templates()
    {
        return $this->belongsTo('App\Models\Templates', 'templates_id', 'id');
    }

    public function UserHasListServices()
    {
        return $this->hasMany('App\Models\UserHasListServices', 'service_id', 'id');
    }
}
