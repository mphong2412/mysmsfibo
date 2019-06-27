<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = "city";

    public function Contacts()
    {
        return $this->belongsTo('App\Models\Contacts', 'city_id', 'id');
    }
}
