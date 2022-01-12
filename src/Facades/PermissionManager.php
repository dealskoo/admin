<?php

namespace Dealskoo\Admin\Facades;

use Illuminate\Support\Facades\Facade;

class PermissionManager extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'permission_manager';
    }
}
