<?php

namespace App\Providers;

// use Illuminate\Auth\Access\Gate;
use Illuminate\Contracts\Auth\Access\Gate;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
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
    public function boot(Gate $gate)
    {
        $this->registerPolicies();

        $gate->define('isRt', function ($user) {
            return $user->peran === 'rt';
        });

        $gate->define('isRw', function ($user) {
            return $user->peran === 'rw';
        });
    }
}
