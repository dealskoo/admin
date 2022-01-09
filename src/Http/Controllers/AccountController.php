<?php

namespace Dealskoo\Admin\Http\Controllers;

use Dealskoo\Admin\Notifications\EmailChangeNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Session;

class AccountController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required']
        ]);
        $admin = $request->user();
        $admin->fill($request->only(['name', 'bio']));
        $admin->save();
        return redirect()->back()->with('success', __('admin::admin.update_success'));
    }

    public function email(Request $request)
    {
        $request->validate(['email' => ['required', 'email', 'unique:admins']]);
        Notification::route('mail', $request->input('email'))->notify(new EmailChangeNotification());
        return redirect()->back()->with('success', __('Email Verify Notification Send Success'));
    }

    public function emailVerify(Request $request)
    {
        $email = Session::get('admin_email_change_verify');
        if (hash_equals($request->route('hash'), sha1($email))) {
            $admin = $request->user();
            $admin->email = $email;
            $admin->save();
            return redirect()->route('admin.account.email')->with('success', __('Email Change Success'));
        } else {
            return redirect()->route('admin.account.email')->withErrors([__('Link expired')]);
        }
    }

    public function password(Request $request)
    {
        $request->validate([
            'password' => ['required', 'min:' . config('admin.password_length')],
            'new_password' => ['required', 'min:' . config('admin.password_length')],
            'new_password_confirmation' => ['required', 'min:' . config('admin.password_length'), 'same:new_password']
        ]);

        if (!$this->guard()->validate([
            'email' => $request->user()->email,
            'password' => $request->password,
        ])) {
            return back()->withErrors([
                'password' => [__('The provided password does not match our records.')]
            ]);
        } else {
            $admin = $request->user();
            $admin->password = bcrypt($request->input('new_password'));
            $admin->save();
            return redirect()->back()->with('success', __('admin::admin.update_success'));
        }
    }
}
