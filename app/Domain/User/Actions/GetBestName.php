<?php

namespace Domain\User\Actions;

use Domain\User\Models\User;

class GetBestName
{
    public function run(User $user)
    {
        $fullNameAction = new GetFullName();
        $nameAction = new GetName();

        if (mb_strlen($user->getFullNameAttribute($fullNameAction)) > User::$MAX_NAME_LENGTH) {
            return $user->getNameAttribute($nameAction);
        } else {
            return $user->getFullNameAttribute($fullNameAction);
        }
    }
}
