<?php

namespace Dealskoo\Admin\Tests\Unit\Models;

use Dealskoo\Admin\Models\Admin;
use Dealskoo\Admin\Models\Permission;
use Dealskoo\Admin\Models\Role;
use Dealskoo\Admin\Notifications\ResetAdminPassword;
use Dealskoo\Admin\Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;

class AdminTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
    }

    public function test_avatar_url()
    {
        $admin = Admin::factory()->create();
        $admin->avatar = 'avatar.png';
        $this->assertEquals($admin->avatar_url, Storage::url($admin->avatar));
    }

    public function test_send_password_reset_notification()
    {
        Notification::fake();
        $admin = Admin::factory()->create();
        $admin->sendPasswordResetNotification('aaa');
        Notification::assertSentTo($admin, ResetAdminPassword::class);
    }

    public function test_roles()
    {
        $admin = Admin::factory()->isOwner()->create();
        $role = Role::factory()->create();
        $admin->roles()->sync([$role->id]);
        $this->assertNotNull($admin->roles);
    }

    public function test_can_do_owner()
    {
        $admin = Admin::factory()->isOwner()->create();
        $this->assertTrue($admin->canDo('admin.settings'));
    }

    public function test_can_do()
    {
        $admin = Admin::factory()->create();
        $role = Role::factory()->create();
        $role->permissions()->saveMany([new Permission(['key' => 'admin.settings'])]);
        $admin->roles()->sync([$role->id]);
        $this->assertTrue($admin->canDo('admin.settings'));
    }
}
