<?php

namespace Dealskoo\Admin\Tests\Unit\Models;

use Dealskoo\Admin\Models\Admin;
use Dealskoo\Admin\Models\Permission;
use Dealskoo\Admin\Models\Role;
use Dealskoo\Admin\Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RoleTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
    }

    public function test_admins()
    {
        $role = Role::factory()->create();
        $admin1 = Admin::factory()->create();
        $admin2 = Admin::factory()->create();
        $role->admins()->sync([$admin1->id, $admin2->id]);
        $this->assertNotEmpty($role->admins);
    }

    public function test_permissions()
    {
        $role = Role::factory()->create();
        $role->permissions()->saveMany([new Permission(['key' => 'admin.settings'])]);
        $this->assertNotEmpty($role->permissions);
    }

    public function test_can_do()
    {
        $role = Role::factory()->create();
        $role->permissions()->saveMany([new Permission(['key' => 'admin.settings'])]);
        $this->assertTrue($role->canDo('admin.settings'));
    }
}
