<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services
     */
    public function boot(): void
    {
        // 🔐 ADMIN GATE
        Gate::define('isAdmin', function ($user) {
            return $user->role === 'admin';
        });

        // 🔐 CUSTOMER GATE
        Gate::define('isCustomer', function ($user) {
            return $user->role === 'customer';
        });
    }
}