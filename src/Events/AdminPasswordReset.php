<?php

namespace Dealskoo\Admin\Events;

use Dealskoo\Admin\Models\Admin;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class AdminPasswordReset
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $admin;

    public function __construct(Admin $admin)
    {
        $this->admin = $admin;
    }
}
