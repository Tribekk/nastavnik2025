<?php

namespace Domain\User\Rules;

use Domain\User\Models\RegisterUser;
use Illuminate\Contracts\Validation\Rule;

class MatchRegisterCode implements Rule
{
    public function passes($attribute, $value)
    {
        $registerUser = new RegisterUser();
        return strcmp($value, $registerUser->getCode()) === 0;
    }

    public function message()
    {
        return __('Неверный «Код подтверждения» регистрации');
    }
}
