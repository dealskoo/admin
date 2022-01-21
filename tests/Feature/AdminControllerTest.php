<?php

namespace Dealskoo\Admin\Tests\Feature;

use Dealskoo\Admin\Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index()
    {
        $this->get(route('admin.admins.index'));
    }

    public function test_table()
    {
        $this->get(route('admin.admins.index', ['HTTP_X-Requested-With' => 'XMLHttpRequest']));
    }

    public function test_store()
    {
        $this->post(route('admin.admins.store'));
    }

    public function test_create()
    {
        $this->get(route('admin.admins.create'));
    }

    public function test_show()
    {
        $this->get(route('admin.admins.show'));
    }

    public function test_edit()
    {
        $this->get(route('admin.admins.edit'));
    }

    public function test_update()
    {
        $this->put(route('admin.admins.update'));
    }

    public function test_destroy()
    {
        $this->delete(route('admin.admins.destroy'));
    }

    public function test_login()
    {
        $this->get(route('admin.admins.login'));
    }
}
