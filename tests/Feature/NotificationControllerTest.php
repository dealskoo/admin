<?php

namespace Dealskoo\Admin\Tests\Feature;

use Dealskoo\Admin\Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class NotificationControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_list()
    {
        $this->get('admin.notification.list');
    }

    public function test_unread()
    {
        $this->get('admin.notification.unread');
    }

    public function test_all_read()
    {
        $this->get('admin.notification.all_read');
    }

    public function test_show()
    {
        $this->get('admin.notification.show');
    }
}
