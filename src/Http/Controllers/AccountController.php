<?php

namespace Dealskoo\Admin\Http\Controllers;

use Dealskoo\Admin\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

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
