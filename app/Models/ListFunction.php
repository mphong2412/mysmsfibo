<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Model;

class ListFunction extends Model
{
    protected $table = "list_function";

    public function Authorization()
    {
        return $this->hasmany('App\Authorization', 'function_id', 'id');
    }
}
