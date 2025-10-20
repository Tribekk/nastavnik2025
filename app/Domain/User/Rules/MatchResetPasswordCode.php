<?php

namespace Domain\User\Rules;

use Domain\User\Models\ResetPasswordUser;
use Domain\User\Models\User;
use Illuminate\Contracts\Validation\Rule;

class MatchResetPasswordCode implements Rule
{
    public function passes($attribute, $value)
    {
        $resetPasswordUser = new ResetPasswordUser();
        $user = User::find($resetPasswordUser->getUserId());

        return strcmp($value, $resetPasswordUser->getCode()) === 0 &&
            strcmp($value, $user->reset_password_code ?? null) === 0;
    }

    public function message()
    {
        return __('Неверный «Код подтверждения» смены пароля');
    }
}
