<?php

namespace Dealskoo\Admin\Tests\Feature;

use Dealskoo\Admin\Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AccountControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_profile()
    {
        $response = $this->get('admin.account.profile');
    }

    public function test_update_profile()
    {
        $response = $this->post('admin.account.profile');
    }

    public function test_avatar()
    {
        $response = $this->post('admin.account.avatar');
    }

    public function test_email()
    {
        $response = $this->get('admin.account.email');
    }

    public function test_update_email()
    {
        $response = $this->post('admin.account.email');
    }

    public function test_email_verify()
    {
        $response = $this->get('admin.account.email.verify');
    }

    public function test_password()
    {
        $response = $this->get('admin.account.password');
    }

    public function test_update_password()
    {
        $response = $this->post('admin.account.password');
    }
}
