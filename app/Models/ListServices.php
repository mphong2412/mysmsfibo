<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ListServices extends Model
{
    protected $table = "list_services";

    public function templates()
    {
        return $this->belongsTo('App\templates', 'templates_id', 'id');
    }

    public function user_has_list_services()
    {
        return $this->hasMany('App\user_has_list_services', 'service_id', 'id');
    }
}
