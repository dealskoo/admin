<?php

namespace Dealskoo\Admin\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class EmailChangeNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return MailMessage
     */
    public function toMail($notifiable)
    {
        Session::put('admin_email_change_verify', $notifiable->routes['mail']);
        $url = URL::temporarySignedRoute(
            'admin.account.email.verify',
            Carbon::now()->addMinutes(Config::get('auth.verification.expire', 60)),
            [
                'hash' => sha1($notifiable->routes['mail']),
            ]
        );
        return (new MailMessage)
            ->subject(__('Email Verify Notification'))
            ->line(__('You are receiving this email because we received an email change request for your account.'))
            ->action(__('Verify Email'), $url)
            ->line(__('This verify email link will expire in :count minutes.', ['count' => config('auth.passwords.admins.expire')]))
            ->line(__('If you did not request an email change, no further action is required.'));
    }
}
