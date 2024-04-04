<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $guard = null)
    {
        // Check if the user is authenticated
        if (Auth::guard($guard)->check()) {
            $user = Auth::user();

            // Check if the user's account is blocked
            if ($user->blocked && $user->role == 'utilisateur') {
                Auth::logout();
                return redirect('/login')->with('error', 'Your account is blocked.');
            }

            // Check if the user's email is verified
            if (!$user->email_verified && $user->role == 'utilisateur') {
                return redirect('/verify/code');
            }

            // Redirect the user based on their role
            switch ($user->role) {
                case 'admin':
                    return redirect('/admin');
                    break;
                case 'utilisateur':
                    return redirect('/home');
                    break;
                default:
                    return redirect('/home');
                    break;
            }
        }

        // If the user is not authenticated, allow access to the route
        return $next($request);
    }
}
