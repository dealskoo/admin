<?php

namespace Dealskoo\Admin\Tests\Notifications;

use Dealskoo\Admin\Notifications\AdminNotification;

class AdminNotificationDemo extends AdminNotification
{
    public function title($notifiable)
    {
        return '';
    }

    public function icon($notifiable)
    {
        return '';
    }

    public function message($notifiable)
    {
        return '';
    }

    public function data($notifiable)
    {
        return [];
    }

    public function view($notifiable)
    {
        return 'admin::nodata';
    }
}
