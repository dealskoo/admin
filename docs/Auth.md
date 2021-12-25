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
