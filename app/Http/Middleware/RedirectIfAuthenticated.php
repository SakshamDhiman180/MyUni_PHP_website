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
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        if (Auth::guard('web')->check()) {
            return redirect(route('dashboard'));
        } elseif (Auth::guard('parents')->check()) {
            return redirect(route('parent.dashboard'));
        } elseif (Auth::guard('teachers')->check()) {
            return redirect(route('teacher.dashboard'));
        }

        return $next($request);
    }
}
