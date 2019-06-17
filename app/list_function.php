<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;

class list_function extends Model
{
    protected $table = "list_function";

    public function authorization()
    {
        return $this->hasmany('App\authorization', 'function_id', 'id');
    }
}
