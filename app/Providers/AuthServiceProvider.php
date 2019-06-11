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
        //$check = session::get('check_rolee');
        // Gate::define('check_feature', function ($check) {
        //   if($check->role == 1 || $check->role == 2 || $check->role == 3){
        //       return false;
        //     }else{
        //       return true;
        //     }
        // });

        //Test
        //$check = Session::get('key_function');
        Gate::define('enable_function', function ($user, $code) {
          $result = Session::get('key_function');
          foreach($result as $rs)
          if($rs == $code){
              return false;
            }else {
              return true;
          }
        });
    }
}
