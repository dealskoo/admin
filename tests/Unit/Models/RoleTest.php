<?php

namespace Dealskoo\Admin\Tests\Unit\Models;

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
    }

    public function test_permissions()
    {

    }

    public function test_can_do()
    {

    }
}
