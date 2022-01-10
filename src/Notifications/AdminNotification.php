<?php

namespace Dealskoo\Admin\Notifications;

use Illuminate\Notifications\Channels\DatabaseChannel;
use Illuminate\Notifications\Notification;

abstract class AdminNotification extends Notification
{
    public function via($notifiable)
    {
        return [DatabaseChannel::class];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'title' => $this->title($notifiable),
            'icon' => $this->icon($notifiable),
            'message' => $this->message($notifiable),
            'data' => $this->data($notifiable),
            'view' => $this->view($notifiable)
        ];
    }

    abstract protected function title($notifiable): string;

    abstract protected function icon($notifiable): string;

    abstract protected function message($notifiable): string;

    abstract protected function data($notifiable): array;

    abstract protected function view($notifiable): string;

}
