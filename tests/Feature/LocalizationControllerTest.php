<?php

namespace Dealskoo\Admin\Tests\Feature;

use Dealskoo\Admin\Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LocalizationControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_locale()
    {
        $response = $this->get(route('admin.locale', 'en'));
        $response->assertStatus(302);
    }
}
