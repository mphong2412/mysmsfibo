<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Templates extends Model
{
    protected $table = "templates";

    public function Services()
    {
        return $this->hasmany('App\Models\ListServices', 'templates_id', 'id');
    }

    public function UserHasTemplates()
    {
        return $this->hasmany('App\Models\UserHasTemplates', 'template_id', 'id');
    }
}
