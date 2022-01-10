<?php

namespace Dealskoo\Admin\Contracts\Support;

use Dealskoo\Admin\Contracts\Dashboard;
use Illuminate\Http\Request;

class DefaultDashboard implements Dashboard
{

    public function handle(Request $request)
    {
        return view('admin::dashboard');
    }
}
