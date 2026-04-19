<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        // 🔐 Admin access
        Gate::define('isAdmin', function (User $user) {
            return $user->role === 'admin';
        });

        // 🔐 Customer access
        Gate::define('isCustomer', function (User $user) {
            return $user->role === 'customer';
        });

        // ❌ IMPORTANT:
        // Passport::routes();  <-- REMOVE THIS (NOT SUPPORTED IN LATEST VERSION)
    }
}