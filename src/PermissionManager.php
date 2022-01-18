<?php

namespace Dealskoo\Admin;

use Dealskoo\Admin\Exceptions\PermissionExistsException;
use Illuminate\Support\Collection;

class PermissionManager
{
    protected $permissions;

    public function __construct()
    {
        $this->permissions = collect([]);
    }

    /**
     * @throws PermissionExistsException
     */
    public function add(Permission $permission, $parent = '')
    {
        if (!$this->permissions->has($permission->getKey())) {
            $this->permissions->put($permission->getKey(), ['permission' => $permission, 'parent' => $parent]);
        } else {
            throw new PermissionExistsException();
        }
    }

    /**
     * @return Collection
     */
    public function all()
    {
        return $this->permissions;
    }

    public function getPermission($key)
    {
        return $this->permissions->get($key);
    }
}
