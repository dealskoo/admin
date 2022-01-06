<?php

namespace Dealskoo\Admin\Http\Controllers;

use Dealskoo\Admin\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function create()
    {
        return view('admin::account');
    }
}
