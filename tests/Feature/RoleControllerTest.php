<?php

namespace Dealskoo\Admin\Tests\Feature;

use Dealskoo\Admin\Models\Admin;
use Dealskoo\Admin\Models\Role;
use Dealskoo\Admin\Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RoleControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index()
    {
        $admin = Admin::factory()->isOwner()->create();
        $response = $this->actingAs($admin, 'admin')->get(route('admin.roles.index'));
        $response->assertStatus(200);
    }

    public function test_table()
    {
        $admin = Admin::factory()->isOwner()->create();
        $response = $this->actingAs($admin, 'admin')->get(route('admin.roles.index'), ['HTTP_X-Requested-With' => 'XMLHttpRequest']);
        $response->assertJsonPath('recordsTotal', 0);
        $response->assertStatus(200);
    }

    public function test_store()
    {
        $admin = Admin::factory()->isOwner()->create();
        $role = Role::factory()->make();
        $response = $this->actingAs($admin, 'admin')->post(route('admin.roles.store'), $role->only([
            'name'
        ]));
        $response->assertStatus(302);
    }

    public function test_create()
    {
        $admin = Admin::factory()->isOwner()->create();
        $response = $this->actingAs($admin, 'admin')->get(route('admin.roles.create'));
        $response->assertStatus(200);
    }

    public function test_show()
    {
        $admin = Admin::factory()->isOwner()->create();
        $role = Role::factory()->create();
        $response = $this->actingAs($admin, 'admin')->get(route('admin.roles.show', $role));
        $response->assertStatus(200);
    }

    public function test_edit()
    {
        $admin = Admin::factory()->isOwner()->create();
        $role = Role::factory()->create();
        $response = $this->actingAs($admin, 'admin')->get(route('admin.roles.edit', $role));
        $response->assertStatus(200);
    }

    public function test_update()
    {
        $admin = Admin::factory()->isOwner()->create();
        $role = Role::factory()->create();
        $role1 = Role::factory()->make();
        $response = $this->actingAs($admin, 'admin')->put(route('admin.roles.update', $role), $role1->only([
            'name'
        ]));
        $response->assertStatus(302);
        $role->refresh();
        $this->assertEquals($role1->name, $role->name);
    }

    public function test_destroy()
    {
        $admin = Admin::factory()->isOwner()->create();
        $role = Role::factory()->create();
        $response = $this->actingAs($admin, 'admin')->delete(route('admin.roles.destroy', $role));
        $response->assertStatus(200);
        $this->assertSoftDeleted($role);
    }
}
