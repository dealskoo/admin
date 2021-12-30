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
            if ($request->is('admin/*')) {
                return route('admin.login');
            }  else {
                return route('login');
            }
        }
    }
```
