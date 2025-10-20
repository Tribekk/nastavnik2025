<?php

namespace Domain\User\Actions;

use Domain\User\Models\User;

class GetNameFirstLetter
{
    public function run(User $user)
    {
        try {
            return mb_substr($user->first_name, 0, 1);
        } catch (\Exception $e) {
            return '';
        }
    }
}
