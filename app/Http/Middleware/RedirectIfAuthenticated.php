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
        if (Auth::guard($guard)->check()) {
            $user = Auth::user();

            if ($user->blocked) {
                Auth::logout();
                return redirect('/login')->with('error', 'Your account is blocked.');
            }

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

        return $next($request);
    }
}
