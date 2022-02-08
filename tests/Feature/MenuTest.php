<?php

namespace Dealskoo\Admin\Tests\Feature;

use Dealskoo\Admin\Facades\AdminMenu;
use Dealskoo\Admin\Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MenuTest extends TestCase
{
    use RefreshDatabase;

    public function test_menu()
    {
        self::assertNotNull(AdminMenu::findBy('title', 'admin::admin.dashboard'));
        self::assertNotNull(AdminMenu::findBy('title', 'admin::admin.settings'));
        $childs = AdminMenu::findBy('title', 'admin::admin.settings')->getChilds();
        $menu = collect($childs)->where('title', 'admin::admin.roles');
        self::assertNotEmpty($menu);
        $menu = collect($childs)->where('title', 'admin::admin.admins');
        self::assertNotEmpty($menu);
    }
}
