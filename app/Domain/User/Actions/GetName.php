<?php

namespace Domain\User\Actions;

use Domain\User\Models\User;

class GetName
{
    public function run(User $user)
    {
        try {
            $name = $user->last_name . ' ' . mb_substr($user->first_name, 0, 1) . '.';

            if (!empty($user->middle_name)) {
                $name = $name . mb_substr($user->middle_name, 0, 1) . '.';
            }

            return trim($name);
        } catch (\Exception $e) {
            return '';
        }
    }
}
