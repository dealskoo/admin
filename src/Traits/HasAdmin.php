<?php

namespace Dealskoo\Admin\Traits;

use Dealskoo\Admin\Models\Admin;

trait HasAdmin
{
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
