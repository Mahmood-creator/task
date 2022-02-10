<?php

namespace App\Providers;

use App\Models\Company;
use App\Policies\CompanyPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::define('admin', function($user){
            if($user->role == 1){
                return true;
            }
            return false;
        });


        Gate::define('company', function($user){
            if($user->role == 2){
                return true;
            }
            return false;
        });

    }
}
