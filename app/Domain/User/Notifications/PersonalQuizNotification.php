<?php

namespace Domain\User\Notifications;

use Domain\User\Models\User;
use Illuminate\Notifications\Messages\MailMessage;
use Support\Notification;

class PersonalQuizNotification extends Notification
{
    protected $orgunit;

    public function __construct($orgunitid)
    {
        $user=User::find($orgunitid);
        $this->orgunit=$user->orgunit();
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject(__("Приглашение на КВИЗ"))
            ->markdown('mail.user.parent-assigned', ['title' => $this->orgunit->title]);
    }

    public function toArray($notifiable)
    {
        return [
            'title' => __('Приглашение на КВИЗ работодателя ') .  $this->orgunit->title
        ];
    }

    public function toIqSms($notifiable)
    {
        /*
        return [
            'to' => $notifiable->phone,
            'message' => __('К Вашему аккаунту прикреплен родитель ') . $this->user->fullName,
        ];
        */
    }
}
