<?php

namespace Domain\User\Actions;

use Domain\User\Models\User;

class GetSex
{
    public function run(User $user)
    {
        if ($user->sex == 2) {
            $sex = 'Женский';
        } elseif ($user->sex == 1) {
            $sex = 'Мужской';
        } else {
            $sex = '';
        }
        return $sex;
    }
}
