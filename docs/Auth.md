```php
return [
    'guards' => [
        'admin' => [
            'driver' => 'session',
            'provider' => 'admins'
        ]
    ],
    'providers' => [
        'driver' => 'eloquent',
        'admins' => Dealskoo\Admin\Models\Admin::class
    ],
    'passwords' => [
        'admins' => [
            'provider' => 'admins',
            'table' => 'admin_password_resets',
            'expire' => 60,
            'throttle' => 60,
        ]
    ]
];
```

```php
namespace App\Http\Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param Request $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            if ($request->is(config('admin.route.prefix') . '/*')) {
                return route('admin.login');
            }  else {
                return route('login');
            }
        }
    }
```

```php
namespace App\Http\Middleware;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param string|null ...$guards
     * @return Response|RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                if ($guard == 'admin') {
                    return redirect(route('admin.dashboard'));
                } else {
                    return redirect(RouteServiceProvider::HOME);
                }
            }
        }

        return $next($request);
    }
}
```

`App\Http\Kernel.php`

```php
    protected $routeMiddleware = [
        'auth' => Authenticate::class,
        'auth.basic' => AuthenticateWithBasicAuth::class,
        'cache.headers' => SetCacheHeaders::class,
        'can' => Authorize::class,
        'guest' => RedirectIfAuthenticated::class,
        'password.confirm' => RequirePassword::class,
        'signed' => ValidateSignature::class,
        'throttle' => ThrottleRequests::class,
        'verified' => EnsureEmailIsVerified::class,
        'admin_locale' => \Dealskoo\Admin\Http\Middleware\AdminLocalization::class,
        'admin_active' => \Dealskoo\Admin\Http\Middleware\ActiveAuth::class,
    ];
```
