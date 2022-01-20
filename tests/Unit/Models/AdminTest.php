<?php

namespace Dealskoo\Admin\Tests\Unit\Models;

use Dealskoo\Admin\Models\Admin;
use Dealskoo\Admin\Tests\TestCase;

class AdminTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    public function testAvatarUrl()
    {
        $admin = Admin::factory()->create();
    }

    public function testSendPasswordResetNotification()
    {

    }

    public function testRoles()
    {

    }

    public function testCanDo()
    {

    }
}
