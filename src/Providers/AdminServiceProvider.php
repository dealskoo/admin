<?php

namespace Dealskoo\Admin\Providers;

use Illuminate\Support\ServiceProvider;

class AdminServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/admin.php', 'admin');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'admin');
        $this->publishes([
            __DIR__ . '/../../config/admin.php' => config_path('admin.php')
        ], 'config');
        $this->publishes([
            __DIR__ . '/../../public' => public_path('vendor/admin')
        ], 'public');
    }
}
