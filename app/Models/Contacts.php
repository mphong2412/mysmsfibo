<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    protected $table = "contacts";

    protected $fillable = ['phone', 'full_name','contact_groups_id'];

    public function ContactGroups()
    {
        return $this->belongsTo('App\Models\ContactGroups', 'contact_groups_id', 'id');
    }
    public function city()
    {
        return $this->hasMany('App\Models\City', 'city_id', 'id');
    }
}
