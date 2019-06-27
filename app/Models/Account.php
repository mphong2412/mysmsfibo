<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $table = "users";
    public function UserHasTemplates()
    {
        return $this->hasmany('App\Models\UserHasTemplates', 'user_id', 'id');
    }

    public function Authorization()
    {
        return $this->hasmany('App\Models\Authorization', 'user_id', 'id');
    }

    public function user_has_list_services()
    {
        return $this->hasmany('App\Models\UserHasListServices', 'user_id', 'id');
    }
}
