<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Redirect after login
     */
    public const HOME = '/admin/dashboard';

    /**
     * Bootstrap services
     */
    public function boot(): void
    {
        $this->configureRateLimiting();

        $this->routes(function () {

            // 🌐 API ROUTES
            Route::prefix('api')
                ->middleware('api')
                ->group(base_path('routes/api.php'));

            // 🌐 WEB ROUTES
            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });
    }

    /**
     * Rate limiting
     */
    protected function configureRateLimiting(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by(
                optional($request->user())->id ?: $request->ip()
            );
        });
    }
}