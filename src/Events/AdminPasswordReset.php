<?php

namespace Dealskoo\Admin\Events;

use Dealskoo\Admin\Models\Admin;
use Illuminate\Queue\SerializesModels;

class AdminPasswordReset
{
    use SerializesModels;

    public $admin;

    public function __construct(Admin $admin)
    {
        $this->admin = $admin;
    }
}
