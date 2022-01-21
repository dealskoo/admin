<?php

namespace Dealskoo\Admin\Tests\Feature;

use Dealskoo\Admin\Models\Admin;
use Dealskoo\Admin\Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DashboardControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_dashboard()
    {
        $admin = Admin::factory()->create();
        $response = $this->actingAs($admin, 'admin')->get(route('admin.dashboard'));
        $response->assertStatus(200);
    }
}
