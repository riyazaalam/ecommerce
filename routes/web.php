<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| LOGIN REDIRECT LOGIC
|--------------------------------------------------------------------------
*/

Route::get('/redirect-after-login', function () {

    if (!auth()->check()) {
        return redirect('/login');
    }

    return auth()->user()->role === 'admin'
        ? redirect('/admin/dashboard')
        : redirect('/dashboard');
});

/*
|--------------------------------------------------------------------------
| ADMIN ROUTES (PROTECTED)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin', 'preventBackHistory'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        Route::post('/dashboard/toggle', [DashboardController::class, 'toggle'])
            ->name('toggle');

    });

/*
|--------------------------------------------------------------------------
| CUSTOMER ROUTES (AUTH)
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| PROFILE ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

});

/*
|--------------------------------------------------------------------------
| AUTH ROUTES
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';