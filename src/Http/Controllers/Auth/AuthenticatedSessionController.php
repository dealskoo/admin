<?php

namespace Dealskoo\Admin\Http\Controllers\Auth;

use Dealskoo\Admin\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class AuthenticatedSessionController extends Controller
{
    public function create()
    {

    }

    public function store()
    {

    }

    public function destroy()
    {
        return redirect('/');
    }
}