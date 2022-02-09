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
        $this->assertNotNull(PermissionManager::getPermission('admin.settings'));
        $this->assertNotNull(PermissionManager::getPermission('roles.index'));
        $this->assertNotNull(PermissionManager::getPermission('roles.show'));
        $this->assertNotNull(PermissionManager::getPermission('roles.create'));
        $this->assertNotNull(PermissionManager::getPermission('roles.edit'));
        $this->assertNotNull(PermissionManager::getPermission('roles.destroy'));

        $this->assertNotNull(PermissionManager::getPermission('admins.index'));
        $this->assertNotNull(PermissionManager::getPermission('admins.show'));
        $this->assertNotNull(PermissionManager::getPermission('admins.create'));
        $this->assertNotNull(PermissionManager::getPermission('admins.edit'));
        $this->assertNotNull(PermissionManager::getPermission('admins.destroy'));
        $this->assertNotNull(PermissionManager::getPermission('admins.login'));
    }
}
