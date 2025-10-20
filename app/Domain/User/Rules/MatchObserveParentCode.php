<?php

namespace Domain\User\Rules;

use Domain\Admin\Models\School;
use Illuminate\Contracts\Validation\Rule;

class MatchObserveParentCode implements Rule
{
    public function passes($attribute, $value)
    {
        return strcmp(config('configure.parent_attach_code', ''), $value) === 0;
    }

    public function message()
    {
        return __('Неверный «Код подтверждения»');
    }
}
