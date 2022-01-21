<?php

namespace Dealskoo\Admin\Tests\Unit\Models;

use Dealskoo\Admin\Models\Admin;
use Dealskoo\Admin\Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

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
    }

    public function test_send_password_reset_notification()
    {

    }

    public function test_roles()
    {

    }

    public function test_can_do_owner()
    {

    }

    public function test_can_do()
    {

    }
}
