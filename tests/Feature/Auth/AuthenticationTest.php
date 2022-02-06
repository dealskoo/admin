<?php

namespace Dealskoo\Admin\Tests\Feature\Auth;

use Dealskoo\Admin\Models\Admin;
use Dealskoo\Admin\Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_screen_default()
    {
        $response = $this->get(route('admin.welcome'));
        $response->assertRedirect(route('admin.dashboard'));
    }

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

    public function test_user_not_authenticate_inactive()
    {
        $response = $this->get(route('admin.banned'));
        $response->assertStatus(200);
    }

    public function test_user_authenticate_inactive()
    {
        $admin = Admin::factory()->inactive()->create();
        $response = $this->actingAs($admin, 'admin')->get(route('admin.dashboard'));
        $response->assertRedirect(route('admin.banned'));
    }

    public function test_user_logout()
    {
        $admin = Admin::factory()->create();
        $response = $this->actingAs($admin, 'admin')->post(route('admin.logout'));
        $response->assertRedirect(route('admin.login'));
    }
}
