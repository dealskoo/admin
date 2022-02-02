<?php

namespace Dealskoo\Admin\Tests\Feature\Console;

use Dealskoo\Admin\Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InitCommandTest extends TestCase
{
    use RefreshDatabase;

    public function test_init_command()
    {
        $this->artisan('admin:init')->assertSuccessful();
        $this->assertDatabaseCount('admins', 1);
    }
}
