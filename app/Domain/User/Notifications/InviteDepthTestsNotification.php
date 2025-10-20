<?php

namespace Domain\User\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Support\Notification;

class InviteDepthTestsNotification extends Notification
{
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject(__("Приглашение на глубинное тестирование"))
            ->markdown('mail.user.invite-depth-tests');
    }

    public function toArray($notifiable)
    {
        return [
            'title' => __('Вы были приглашены на прохождение глубинного тестирования')
        ];
    }

    public function toIqSms($notifiable)
    {
        return [
            'to' => $notifiable->phone,
            'message' => __('Вы были приглашены на прохождение глубинного тестирования'),
        ];
    }
}
