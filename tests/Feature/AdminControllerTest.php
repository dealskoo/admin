<?php

namespace Dealskoo\Admin\Tests\Feature;

use Dealskoo\Admin\Models\Admin;
use Dealskoo\Admin\Notifications\ResetAdminPassword;
use Dealskoo\Admin\Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;

class AdminControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index()
    {
        $admin = Admin::factory()->isOwner()->create();
        $response = $this->actingAs($admin, 'admin')->get(route('admin.admins.index'));
        $response->assertStatus(200);
    }

    public function test_table()
    {
        $admin = Admin::factory()->isOwner()->create();
        $response = $this->actingAs($admin, 'admin')->get(route('admin.admins.index', ['HTTP_X-Requested-With' => 'XMLHttpRequest']));
        $response->assertStatus(200);
    }

    public function test_store()
    {
        Notification::fake();
        $admin = Admin::factory()->isOwner()->create();
        $admin1 = Admin::factory()->make();
        $response = $this->actingAs($admin, 'admin')->post(route('admin.admins.store'), $admin1->only([
            'name',
            'email',
            'bio',
        ]));
        $response->assertStatus(302);
        $admin1 = Admin::query()->where('email', $admin1->email)->first();
        Notification::assertSentTo($admin1, ResetAdminPassword::class);
    }

    public function test_create()
    {
        $admin = Admin::factory()->isOwner()->create();
        $response = $this->actingAs($admin, 'admin')->get(route('admin.admins.create'));
        $response->assertStatus(200);
    }

    public function test_show()
    {
        $admin = Admin::factory()->isOwner()->create();
        $response = $this->actingAs($admin, 'admin')->get(route('admin.admins.show', $admin));
        $response->assertStatus(200);
    }

    public function test_edit()
    {
        $admin = Admin::factory()->isOwner()->create();
        $response = $this->actingAs($admin, 'admin')->get(route('admin.admins.edit', $admin));
        $response->assertStatus(200);
    }

    public function test_update()
    {
        $admin = Admin::factory()->isOwner()->create();
        $admin1 = Admin::factory()->make();
        $response = $this->actingAs($admin, 'admin')->put(route('admin.admins.update', $admin), $admin1->only([
            'name',
            'bio'
        ]));
        $response->assertStatus(302);
        $admin->refresh();
        $this->assertEquals($admin1->name, $admin->name);
    }

    public function test_destroy()
    {
        $admin = Admin::factory()->isOwner()->create();
        $response = $this->actingAs($admin, 'admin')->delete(route('admin.admins.destroy', $admin));
        $response->assertStatus(200);
        $this->assertSoftDeleted($admin);
    }

    public function test_login()
    {
        $admin = Admin::factory()->isOwner()->create();
        $admin1 = Admin::factory()->create();
        $this->actingAs($admin, 'admin')->get(route('admin.admins.login', $admin1));
        $this->assertAuthenticatedAs($admin1, 'admin');
    }
}
