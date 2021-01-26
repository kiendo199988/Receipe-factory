<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        Recipe::class => RecipePolicy::class,

    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // define a admin user role
        // returns true if user role is set to admin
        Gate::define('isAdmin', function($user) {
           return $user->role == 'admin';
        });
    
        // define a author user role
        // returns true if user role is set to author
        Gate::define('isAuthor', function($user) {
            return $user->role == 'author';
        });
    
        // define a author user role
        // returns true if user role is set to author
        Gate::define('isRegistered', function($user) {
            return $user->role == 'registered';
        });
    }
}
