<?php

namespace Dealskoo\Admin\Tests\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Orchestra\Testbench\Http\Middleware\RedirectIfAuthenticated as Middleware;

class RedirectIfAuthenticated extends Middleware
{
    public function handle($request, Closure $next, $guard = null)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                if ($guard == 'admin') {
                    return redirect(route('admin.dashboard'));
                } else {
                    return redirect('/home');
                }
            }
        }

        return $next($request);
    }
}
