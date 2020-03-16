<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        \Gate::define('index-question',function($user){
            return $user;
        });

        \Gate::define('update-question',function($user,$question){
            return $user->id === $question->user_id;
        });

        \Gate::define('deleted-question',function($user,$question){
            return $user->id === $question->user_id;
        });
        //
    }
}
