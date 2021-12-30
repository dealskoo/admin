<?php

namespace Dealskoo\Admin\Http\Controllers\Auth;

use Dealskoo\Admin\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PasswordResetLinkController extends Controller
{
    public function create()
    {
        return view('admin::auth.forgot-password');
    }

    public function store()
    {

    }
}
