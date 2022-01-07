<?php

namespace Dealskoo\Admin\Http\Controllers;

use Dealskoo\Admin\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function list(Request $request)
    {
        $notifications = $request->user()->notifications()->paginate(10);
        return view('admin::notifications', ['notifications' => $notifications]);
    }

    public function show(Request $request, $id)
    {
        $notification = $request->user()->notifications()->where('id', $id)->first();
        if ($notification) {
            $notification->makrAsRead();
        }
        return view('admin::notification', ['notification' => $notification]);
    }

    public function allRead(Request $request)
    {
        $request->user()->unreadNotifications->markAsRead();
        return redirect()->back();
    }
}
