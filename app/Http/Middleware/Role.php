<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Auth\Middleware\Role as Middleware;
use Illuminate\Support\Facades\Auth;

class Role {

  public function handle($request, Closure $next, string $role)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        $user = Auth::user();

        if ($user->blocked) {
            Auth::logout(); // Logout the user
            $request->session()->invalidate(); // Invalidate the session
            $request->session()->regenerateToken(); // Regenerate the CSRF token

            return redirect('/login')->with('error', 'Your account has been blocked. Please contact support.');
        }

        if ($user->role == $role) {
            return $next($request);
        }

        return redirect('/login');
    }
}