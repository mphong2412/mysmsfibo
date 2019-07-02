<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Model;

class ListFunction extends Model
{
    protected $table = "list_function";

    public function authorization()
    {
        return $this->hasmany('App\authorization', 'function_id', 'id');
    }
}
