<?php

namespace Dealskoo\Admin\Tests\Feature;

use Dealskoo\Admin\Models\Admin;
use Dealskoo\Admin\Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SearchControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_search()
    {
        $admin = Admin::factory()->create();
        $response = $this->actingAs($admin, 'admin')->get(route('admin.search'));
        $response->assertStatus(200);
    }
}
