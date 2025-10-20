<?php

namespace Domain\User\Actions;


class UpdateUser
{
    public function run(array $data): bool
    {

        $userData = [
            'last_name' => $data['last_name'],
            'first_name' => $data['first_name'],
            'middle_name' => $data['middle_name'] ?? null,
            'phone' => $data['phone'] ?? null,
            'school_id' => $data['school_id'] ?? null,
            'class_id' => $data['class_id'] ?? null,
        ];

        if(is_null($userData['phone'])) unset($userData['phone']);
        if(is_null($userData['school_id'])) unset($userData['school_id']);
        if(is_null($userData['class_id'])) unset($userData['class_id']);

        if($data['new_avatar']) {
            $filename = $data['new_avatar']->store('/', 'avatars');
            $userData['avatar'] = $filename;
        }

        return auth()->user()->update($userData);
    }

}
