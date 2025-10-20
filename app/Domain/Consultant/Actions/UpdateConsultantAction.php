<?php

namespace Domain\Consultant\Actions;


use Domain\User\Models\User;

class UpdateConsultantAction
{
    public function run(User $user, array $data) {
        $user->consultant()->update([
            'regalia_and_experience' => $data['regalia_and_experience'],
            'experience' => $data['experience'],
        ]);
    }
}
