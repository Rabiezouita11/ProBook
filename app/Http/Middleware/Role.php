<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Role
{
    public function handle($request, Closure $next, string $role)
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            $user = Auth::user();

            // Check if the user is blocked and has the role of 'utilisateur'
            if ($user->blocked && $user->role == 'utilisateur') {
                Auth::logout(); // Logout the user
                $request->session()->invalidate(); // Invalidate the session
                $request->session()->regenerateToken(); // Regenerate the CSRF token

                return redirect('/login')->with('error', 'Your account has been blocked. Please contact support.');
            }

            // Check if the user's email is verified
            if (!$user->email_verified && $user->role == 'utilisateur') {
                // If email is not verified, redirect to a view to enter the verification code
                return redirect()->route('enter_verification_code');
            }

            // If the user's role matches the specified role, proceed
            if ($user->role == $role) {
                return $next($request);
            }
        }

        // Allow access to the route for unauthenticated users
        return $next($request);
    }
}
