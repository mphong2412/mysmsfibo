<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserHasServices extends Model
{
  protected $table = "user_has_list_services";

  public function ListServices()
  {
      return $this->hasMany('App\Models\ListServices', 'service_id', 'id');
  }

  public function Account()
  {
      return $this->hasMany('App\Models\Account', 'user_id', 'id');
  }
}
