<?php

namespace Dealskoo\Admin\Http\Controllers;

use Dealskoo\Admin\Contracts\Dashboard;
use Dealskoo\Admin\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function handle(Request $request, Dashboard $dashboard)
    {
        return $dashboard->handle($request);
    }
}
