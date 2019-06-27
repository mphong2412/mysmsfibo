<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserHasTemplates extends Model
{
    protected $table = "user_has_templates";

    public function Templates()
    {
        return $this->hasmany('App\Models\Templates', 'template_id', 'id');
    }

    public function Account()
    {
        return $this->hasmany('App\Models\Account', 'user_id', 'id');
    }
}
