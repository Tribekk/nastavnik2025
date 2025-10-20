<?php

namespace Domain\User\Actions;

use Domain\User\Models\User;

class GetFullName
{
    public function run(User $user)
    {
        try {
            return trim($user->last_name . ' ' . $user->first_name . ' ' . $user->middle_name);
        } catch (\Exception $e) {
            return '';
        }
    }
}
