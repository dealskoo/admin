<?php

namespace Dealskoo\Admin\Tests\Feature;

use Dealskoo\Admin\Models\Admin;
use Dealskoo\Admin\Tests\Notifications\AdminNotificationDemo;
use Dealskoo\Admin\Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class NotificationControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_list()
    {
        $admin = Admin::factory()->isOwner()->create();
        $response = $this->actingAs($admin, 'admin')->get(route('admin.notification.list'));
        $response->assertStatus(200);
    }

    public function test_unread()
    {
        $admin = Admin::factory()->isOwner()->create();
        $response = $this->actingAs($admin, 'admin')->get(route('admin.notification.unread'));
        $response->assertStatus(200);
    }

    public function test_all_read()
    {
        $admin = Admin::factory()->isOwner()->create();
        $response = $this->actingAs($admin, 'admin')->get(route('admin.notification.all_read'));
        $response->assertStatus(302);
    }

    public function test_show()
    {
        $admin = Admin::factory()->isOwner()->create();
        $admin->notify(new AdminNotificationDemo());
        $notification = $admin->notifications->last();
        $response = $this->actingAs($admin, 'admin')->get(route('admin.notification.show', $notification));
        $response->assertStatus(200);
    }
}
