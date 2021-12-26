<?php

namespace Dealskoo\Admin\Http\Controllers\Auth;

use Dealskoo\Admin\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PasswordResetLinkController extends Controller
{
    public function create(Request $request)
    {
        return view('admin::auth.reset-password', ['request' => $request]);
    }

    public function store()
    {

    }
}
