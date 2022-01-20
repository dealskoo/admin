<?php

namespace Dealskoo\Admin\Tests;

use Dealskoo\Admin\Facades\PermissionManager;
use Dealskoo\Admin\Models\Admin;
use Dealskoo\Admin\Providers\AdminServiceProvider;
use Dealskoo\Admin\Tests\Http\Kernel;

abstract class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            AdminServiceProvider::class
        ];
    }

    protected function getPackageAliases($app)
    {
        return [
            'PermissionManager' => PermissionManager::class
        ];
    }

    public function ignorePackageDiscoveriesFrom()
    {
        return [];
    }

    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'testing');
        $app['config']->set('database.connections.testing', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => ''
        ]);
        $app['config']->set('auth.guards.admin', [
            'driver' => 'session',
            'provider' => 'admins',
        ]);
        $app['config']->set('auth.providers.admins', [
            'driver' => 'eloquent',
            'model' => Admin::class,
        ]);
        $app['config']->set('auth.passwords.admins', [
            'provider' => 'admins',
            'table' => 'admin_password_resets',
            'expire' => 60,
            'throttle' => 60,
        ]);
        $app['config']->set('auth.password_length', 8);
    }

    protected function resolveApplicationHttpKernel($app)
    {
        $app->singleton(\Illuminate\Contracts\Http\Kernel::class, Kernel::class);
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    }
}
