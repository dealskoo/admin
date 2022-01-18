<?php

namespace Dealskoo\Admin\Providers;

use Dealskoo\Admin\Console\InitCommand;
use Dealskoo\Admin\Contracts\Dashboard;
use Dealskoo\Admin\Contracts\Searcher;
use Dealskoo\Admin\Contracts\Support\DefaultDashboard;
use Dealskoo\Admin\Contracts\Support\DefaultSearcher;
use Dealskoo\Admin\Facades\PermissionManager;
use Dealskoo\Admin\Menu\AdminPresenter;
use Dealskoo\Admin\Permission;
use Illuminate\Support\ServiceProvider;
use Nwidart\Menus\Facades\Menu;

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
        $this->app->singleton('admin_menu', function () {
            return Menu::instance('admin_navbar');
        });
        $this->app->singleton('permission_manager', \Dealskoo\Admin\PermissionManager::class);
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

        Menu::create('admin_navbar', function ($menu) {
            $menu->enableOrdering();
            $menu->addHeader('admin::admin.navigation');
            $menu->setPresenter(AdminPresenter::class);
            $menu->route('admin.dashboard', 'admin::admin.dashboard', [], ['icon' => 'uil-home-alt']);
            $menu->dropdown('admin::admin.settings', function ($sub) {
                $sub->route('admin.roles.index', 'admin::admin.roles');
                $sub->route('admin.admins.index', 'admin::admin.admins');
            }, ['icon' => 'uil-bright'])->order(100);
        });

        PermissionManager::add(new Permission('admin.settings', 'Settings'));
        PermissionManager::add(new Permission('roles.index', 'Role List'), 'admin.settings');
        PermissionManager::add(new Permission('roles.show', 'View Role'), 'roles.index');
        PermissionManager::add(new Permission('roles.create', 'Create Role'), 'roles.index');
        PermissionManager::add(new Permission('roles.edit', 'Edit Role'), 'roles.index');
        PermissionManager::add(new Permission('roles.destroy', 'Destroy Role'), 'roles.index');

        PermissionManager::add(new Permission('admins.index', 'Admin List'), 'admin.settings');
        PermissionManager::add(new Permission('admins.show', 'View Admin'), 'admins.index');
        PermissionManager::add(new Permission('admins.create', 'Create Admin'), 'admins.index');
        PermissionManager::add(new Permission('admins.edit', 'Edit Admin'), 'admins.index');
        PermissionManager::add(new Permission('admins.destroy', 'Destroy Admin'), 'admins.index');
    }
}
