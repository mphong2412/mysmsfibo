<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;

class account extends Model
{
    protected $table = "users";

    public function user_has_templates()
    {
        return $this->hasmany('App\user_has_templates', 'user_id', 'id');
    }
}
