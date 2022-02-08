<?php

namespace Dealskoo\Admin\Tests\Http\Middleware;

use Orchestra\Testbench\Http\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            if ($request->is(config('admin.route.prefix') . '/*')) {
                return route('admin.login');
            } else {
                return route('login');
            }
        }
    }
}
