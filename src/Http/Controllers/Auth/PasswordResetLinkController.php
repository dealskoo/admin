<?php

namespace Dealskoo\Admin\Http\Controllers\Auth;

use Dealskoo\Admin\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class PasswordResetLinkController extends Controller
{
    public function create()
    {
        return view('admin::auth.forgot-password');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email']
        ]);
        $status = Password::broker('admins')->sendResetLink($request->only('email'));
        return $status == Password::RESET_LINK_SENT ?
            back()->withInput($request->only('email'))->with('status', __($status)) :
            back()->withInput($request->only('email'))->withErrors(['email' => __($status)]);
    }
}
