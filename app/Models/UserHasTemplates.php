<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserHasTemplates extends Model
{
    protected $table = "user_has_templates";

    public function templates()
    {
        return $this->hasmany('App\templates', 'template_id', 'id');
    }

    public function account()
    {
        return $this->hasmany('App\account', 'user_id', 'id');
    }
}
