<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Templates extends Model
{
    protected $table = "templates";

    public function services()
    {
        return $this->hasmany('App\list_services', 'templates_id', 'id');
    }

    public function user_has_templates()
    {
        return $this->hasmany('App\user_has_templates', 'template_id', 'id');
    }
}
