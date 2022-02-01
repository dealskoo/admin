<?php
return [
    'route' => [
        'prefix' => env('ADMIN_ROUTE_PREFIX', 'admin'),
    ],
    'logo' => '/vendor/admin/images/logo.svg',
    'logo_dark' => '/vendor/admin/images/logo_dark.svg',
    'logo_sm' => '/vendor/admin/images/logo_sm.svg',
    'logo_sm_dark' => '/vendor/admin/images/logo_sm_dark.svg',
    'copyright' => '2014 - ' . date('Y') . ' ' . config('app.name'),
    'footer_menus' => [[
        'name' => 'about',
        'url' => 'admin.dashboard'
    ], [
        'name' => 'support',
        'url' => 'admin.login'
    ], [
        'name' => 'contact_us',
        'url' => 'admin.login'
    ]],
    'languages' => ['en' => [
        'icon' => '/vendor/admin/images/flags/us.svg',
        'name' => 'English'
    ], 'zh_CN' => [
        'icon' => '/vendor/admin/images/flags/cn.svg',
        'name' => '简体中文'
    ]],
];
