<?php

namespace Dealskoo\Admin\Tests\Feature;

use Dealskoo\Admin\Facades\PermissionManager;
use Dealskoo\Admin\Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PermissionTest extends TestCase
{
    use RefreshDatabase;

    public function test_permissions()
    {
        self::assertNotNull(PermissionManager::getPermission('admin.settings'));
        self::assertNotNull(PermissionManager::getPermission('roles.index'));
        self::assertNotNull(PermissionManager::getPermission('roles.show'));
        self::assertNotNull(PermissionManager::getPermission('roles.create'));
        self::assertNotNull(PermissionManager::getPermission('roles.edit'));
        self::assertNotNull(PermissionManager::getPermission('roles.destroy'));

        self::assertNotNull(PermissionManager::getPermission('admins.index'));
        self::assertNotNull(PermissionManager::getPermission('admins.show'));
        self::assertNotNull(PermissionManager::getPermission('admins.create'));
        self::assertNotNull(PermissionManager::getPermission('admins.edit'));
        self::assertNotNull(PermissionManager::getPermission('admins.destroy'));
        self::assertNotNull(PermissionManager::getPermission('admins.login'));
    }
}
