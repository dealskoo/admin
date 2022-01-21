# Admin Theme of [Dealskoo](https://www.dealskoo.com)

## TODO

- [x] Admin Management
- [x] Menu Management
- [x] Permission Management
- [x] Role Management
- [x] Multi Language

## Install

```base
$ composer require dealskoo\admin
```

### Publish vendor

```base 
$ php artisan vendor:publish --provider="Dealskoo\Admin\Providers\AdminServiceProvider" --tag=public
```

### Publish config

```base 
$ php artisan vendor:publish --provider="Dealskoo\Admin\Providers\AdminServiceProvider" --tag=config
```

### Publish lang

```base 
$ php artisan vendor:publish --provider="Dealskoo\Admin\Providers\AdminServiceProvider" --tag=lang
```

## Initial Admin Account

```bash
$ php artisan admin:init
```

## Register Guards

Edit `config\auth.php`

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
    
    'password_length' => 8,
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

## Add Middleware

`App\Http\Kernel.php`

```php
    protected $routeMiddleware = [
        'admin_locale' => \Dealskoo\Admin\Http\Middleware\AdminLocalization::class,
        'admin_active' => \Dealskoo\Admin\Http\Middleware\ActiveAuth::class,
    ];
```

## Support

- [Dealskoo](https://www.dealskoo.com)
- [Best Deals](https://www.dealskoo.com/best_deals)
- [Promo Codes](https://www.dealskoo.com/promo_codes)
