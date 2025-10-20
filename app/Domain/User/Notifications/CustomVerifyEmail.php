<?php

namespace Domain\User\Notifications;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Lang;

class CustomVerifyEmail extends VerifyEmail
{
    public function toMail($notifiable)
    {
        if (static::$toMailCallback) {
            return call_user_func(static::$toMailCallback, $notifiable);
        }

        return (new MailMessage)
            ->subject(Lang::get('Проверка адреса электронной почты'))
            ->line(Lang::get('Пожалуйста, нажмите кнопку ниже для проверки адреса электронной почты!'))
            ->action(
                Lang::get('Проверить адрес электронной почты'),
                $this->verificationUrl($notifiable)
            )
            ->line(Lang::get('Если вы не создавали учетную запись, то просто проигнорируйте данное письмо.'));
    }

    public function toArray($notifiable)
    {
        return [
            'title' => __('Проверка адреса электронной почты'),
            'body' => __('На Ваш адрес электронной почты отправлено для подтверждения.'),
        ];
    }
}
