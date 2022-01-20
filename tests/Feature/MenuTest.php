<?php

namespace Dealskoo\Admin\Tests\Feature;

use Dealskoo\Admin\Facades\AdminMenu;
use Dealskoo\Admin\Tests\TestCase;

class MenuTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    public function testMenu()
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
