<?php

namespace Dealskoo\Admin\Tests\Feature;

use Dealskoo\Admin\Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RoleControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index()
    {
        $this->get(route('admin.roles.index'));
    }

    public function test_table()
    {
        $this->get(route('admin.roles.index', ['HTTP_X-Requested-With' => 'XMLHttpRequest']));
    }

    public function test_store()
    {
        $this->post(route('admin.roles.store'));
    }

    public function test_create()
    {
        $this->get(route('admin.roles.create'));
    }

    public function test_show()
    {
        $this->get(route('admin.roles.show'));
    }

    public function test_edit()
    {
        $this->get(route('admin.roles.edit'));
    }

    public function test_update()
    {
        $this->put(route('admin.roles.update'));
    }

    public function test_destroy()
    {
        $this->delete(route('admin.roles.destroy'));
    }
}
