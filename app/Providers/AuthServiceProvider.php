<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
         //'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('enable_function', function($use, $code) {
          $result = Session::get('key_function');
          $check = 3;
          foreach($result as $rs) {
            if ($rs->function_name == $code) {
              $check = 4;
            }
          }
          if ($check == 3) {
            return true;
          } else {
            return false;
          }
        });
    }
}
