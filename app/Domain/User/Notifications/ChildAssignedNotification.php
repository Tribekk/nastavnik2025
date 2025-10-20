<?php

namespace Domain\User\Notifications;

use Domain\User\Models\User;
use Illuminate\Notifications\Messages\MailMessage;
use Support\Notification;

class ChildAssignedNotification extends Notification
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject(__("Настройка учетной записи"))
            ->markdown('mail.user.parent-assigned', ['title' => $this->user->fullName]);
    }

    public function toArray($notifiable)
    {
        return [
            'title' => __('Привязан родитель ') . $this->user->fullName
        ];
    }

    public function toIqSms($notifiable)
    {
        return [
            'to' => $notifiable->phone,
            'message' => __('К Вашему аккаунту привязан родитель ') . $this->user->fullName,
        ];
    }
}
