<?php

namespace Domain\User\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EmailNotVerifiedNotification extends Notification
{
    use Queueable;

    public function via($notifiable)
    {
        return ['broadcast'];
    }

    public function toArray($notifiable)
    {
        return [
            'title' => __('Требуется подтверждение адреса электронной почты'),
            'body' => __('Для подтверждения перейдите по ссылке'),
            'link' => route('verification.notice')
        ];
    }
}
