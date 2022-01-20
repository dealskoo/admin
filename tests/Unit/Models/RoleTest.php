<?php

namespace Dealskoo\Admin\Tests\Unit\Models;

use Dealskoo\Admin\Models\Role;
use Dealskoo\Admin\Tests\TestCase;

class RoleTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    public function testAdmins()
    {
        $role = Role::factory()->create();
    }

    public function testPermissions()
    {

    }

    public function testCanDo()
    {

    }
}
