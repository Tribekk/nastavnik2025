<?php

namespace Domain\User\Notifications;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Lang;

class CustomResetPassword extends ResetPassword
{
    public function toMail($notifiable)
    {
        if (static::$toMailCallback) {
            return call_user_func(static::$toMailCallback, $notifiable, $this->token);
        }

        return (new MailMessage)
            ->subject(Lang::get('Восстановление пароля'))
            ->line(Lang::get('Вы получили это письмо, так как нам был отправлен запрос на восстановление пароля для вашего аккаунта.'))
            ->action(Lang::get('Восстановить пароль'), url(config('app.url').route('password.reset', ['token' => $this->token], false)))
            ->line(Lang::get('Данная ссылка на восстановление пароля истекает через :count минут.', ['count' => config('auth.passwords.users.expire')]))
            ->line(Lang::get('Если вы не отправляли запрос на восстановление пароля, никаких действий не требуется.'));
    }
}
