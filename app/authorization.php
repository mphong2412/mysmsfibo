<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;

class authorization extends Model
{
    protected $table = "authorization";

    public function list_function()
    {
        return $this->hasmany('App\list_function', 'function_id', 'id');
    }

    public function account()
    {
        return $this->hasmany('App\account', 'user_id', 'id');
    }
}
