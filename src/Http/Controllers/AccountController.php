<?php

namespace Dealskoo\Admin\Http\Controllers;

use Dealskoo\Admin\Exceptions\AdminException;
use Dealskoo\Admin\Notifications\EmailChangeNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules;

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
        return back()->with('success', __('admin::admin.update_success'));
    }

    /**
     * @throws AdminException
     */
    public function avatar(Request $request)
    {
        $request->validate([
            'file' => ['required', 'image', 'max:1000']
        ]);

        $image = $request->file('file');
        $admin = $request->user();
        $filename = $admin->id . '.' . $image->guessExtension();
        $path = $image->storeAs('admin/avatars', $filename);
        $admin->avatar = $path;
        $admin->save();
        return ['url' => $admin->avatar_url];
    }

    public function email(Request $request)
    {
        $request->validate(['email' => ['required', 'email', 'unique:admins']]);
        Notification::route('mail', $request->input('email'))->notify(new EmailChangeNotification());
        return back()->withInput($request->only(['email']))->with('success', __('Email Verify Notification Send Success'));
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
            'password' => ['required', 'min:' . config('auth.password_length')],
            'new_password' => ['required', 'confirmed', Rules\Password::min(config('auth.password_length'))],
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
            $admin->password = Hash::make($request->input('new_password'));
            $admin->save();
            return back()->with('success', __('admin::admin.update_success'));
        }
    }
}
