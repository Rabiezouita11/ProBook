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
    
        if ($user->blocked && $user->role == 'utilisateur') {
            Auth::logout(); // Logout the user
            $request->session()->invalidate(); // Invalidate the session
            $request->session()->regenerateToken(); // Regenerate the CSRF token
    
            return redirect('/login')->with('error', 'Your account has been blocked. Please contact support.');
        }
    
        // If the user is not blocked, check if their email is verified
        if (!$user->email_verified && $user->role == 'utilisateur' ) {
            // If email is not verified, redirect to a view to enter the verification code
          
            return redirect()->route('enter_verification_code');
        }
    
        // If the user is not blocked and their email is verified, proceed to check role
        if ($user->role == $role) {
            return $next($request);
        }
    
        return redirect('/login');
    }
    
}