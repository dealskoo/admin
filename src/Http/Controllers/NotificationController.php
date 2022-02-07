<?php

namespace Dealskoo\Admin\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function list(Request $request)
    {
        $notifications = $request->user()->notifications()->paginate(10);
        return view('admin::notifications', ['notifications' => $notifications]);
    }

    public function unread(Request $request)
    {
        $notifications = $request->user()->unreadNotifications()->paginate(10);
        return view('admin::notifications', ['notifications' => $notifications]);
    }

    public function show(Request $request, $id)
    {
        $notification = $request->user()->notifications()->where('id', $id)->first();
        if ($notification) {
            $notification->markAsRead();
        } else {
            abort(404);
        }
        return view('admin::notification', ['notification' => $notification]);
    }

    public function allRead(Request $request)
    {
        $request->user()->unreadNotifications->markAsRead();
        return back();
    }
}
