<?php

namespace Domain\User\Rules;

use Illuminate\Contracts\Validation\Rule;

class MatchConsultantAssignToken implements Rule
{
    public function passes($attribute, $value)
    {
        return strcmp(config('configure.assign_role_consultant_code'), $value) === 0;
    }

    public function message()
    {
        return __('Неверный «Код доступа»');
    }
}
