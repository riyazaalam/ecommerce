<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
      
        // ❌ If not logged in
        if (!Auth::check()) {
            return redirect('/login');
        }

        $user = Auth::user();

        // ❌ If not admin
        if ($user->role !== 'admin') {
            return redirect('/admin/dashboard');
        }

        // ❌ If user not active
        if ($user->is_active != 1) {
            Auth::logout();
            return redirect('/login')
                ->withErrors(['Your account is inactive. Please contact admin.']);
        }

        return $next($request);
    }
}