<?php

namespace Dealskoo\Admin\Providers;

use Dealskoo\Admin\Console\InitCommand;
use Dealskoo\Admin\Contracts\Dashboard;
use Dealskoo\Admin\Contracts\Searcher;
use Dealskoo\Admin\Contracts\Support\DefaultDashboard;
use Dealskoo\Admin\Contracts\Support\DefaultSearcher;
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
        $this->app->bind(Dashboard::class, DefaultDashboard::class);
        $this->app->bind(Searcher::class, DefaultSearcher::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                InitCommand::class,
            ]);
        }

        $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');

        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'admin');

        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');

        $this->loadTranslationsFrom(__DIR__ . '/../../resources/lang', 'admin');

        $this->publishes([
            __DIR__ . '/../../config/admin.php' => config_path('admin.php')
        ], 'config');
        $this->publishes([
            __DIR__ . '/../../public' => public_path('vendor/admin')
        ], 'public');
        $this->publishes([
            __DIR__ . '/../../resources/lang' => resource_path('lang/vendor/admin'),
        ], 'lang');

    }
}
