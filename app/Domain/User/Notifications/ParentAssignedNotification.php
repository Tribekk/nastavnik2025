<?php

namespace Domain\User\Notifications;

use Domain\User\Models\User;
use Illuminate\Notifications\Messages\MailMessage;
use Support\Notification;

class ParentAssignedNotification extends Notification
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
            ->markdown('mail.user.child-assigned', ['title' => $this->user->fullName]);
    }

    public function toArray($notifiable)
    {
        return [
            'title' => __('Привязан ученик ') . $this->user->fullName,
        ];
    }

    public function toIqSms($notifiable)
    {
        return [
            'to' => $notifiable->phone,
            'message' => __('К Вашему аккаунту привязан ученик ') . $this->user->fullName,
        ];
    }
}
