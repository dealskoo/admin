<?php

namespace Dealskoo\Admin\Tests;

use Dealskoo\Admin\Facades\PermissionManager;
use Dealskoo\Admin\Providers\AdminServiceProvider;

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
    }

    protected function resolveApplicationHttpKernel($app)
    {
        $app->singleton(Illuminate\Contracts\Http\Kernel::class, Kernel::class);
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    }
}
