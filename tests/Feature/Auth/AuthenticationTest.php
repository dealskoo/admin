<?php

namespace Dealskoo\Admin\Tests\Feature\Auth;

use Dealskoo\Admin\Models\Admin;
use Dealskoo\Admin\Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_screen_can_be_rendered()
    {
        $response = $this->get(route('admin.login'));

        $response->assertStatus(200);
    }

    public function test_users_can_authenticate_using_the_login_screen()
    {
        $admin = Admin::factory()->create();

        $response = $this->post(route('admin.login'), [
            'email' => $admin->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated('admin');
        $response->assertRedirect(route('admin.dashboard'));
    }

    public function test_users_can_not_authenticate_with_invalid_password()
    {
        $admin = Admin::factory()->create();

        $this->post(route('admin.login'), [
            'email' => $admin->email,
            'password' => 'wrong-password',
        ]);

        $this->assertGuest('admin');
    }
}
