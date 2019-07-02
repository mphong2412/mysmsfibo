<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    protected $table = "contacts";

    protected $fillable = ['phone', 'full_name','contact_groups_id'];

    public function contact_groups()
    {
        return $this->belongsTo('App\contact_groups', 'contact_groups_id', 'id');
    }
    public function city()
    {
        return $this->hasMany('App\city', 'city_id', 'id');
    }
}
