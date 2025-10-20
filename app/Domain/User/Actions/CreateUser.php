<?php

namespace Domain\User\Actions;

use Domain\User\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CreateUser
{
    public function run(array $data, bool $doHashPass = true): User
    {
        if(isset($data['avatar'])) {
            $filename = $data['avatar']->store('/', 'avatars');
            $data['avatar'] = $filename;
        }

        if(isset($data['phone']) && $data['phone']) {
            $data['phone'] = unFormatPhone($data['phone']);
        }

        return User::create([
            'first_name' => $data['first_name'],
            'middle_name' => $data['middle_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'] ?? null,
            'email_verified_at' => $data['email_verified_at'] ?? null,
            'uuid' => Str::uuid(),
            'password' => $doHashPass ? Hash::make($data['password']) : $data['password'],
            'phone' => $data['phone'] ?? null,
            'birth_date' => $data['birth_date'] ?? null,
            'sex' => $data['sex'] ?? null,
            'avatar' => $data['avatar'] ?? null,
            'school_id' => $data['school_id'] ?? null,
            'class_id' => $data['class_id'] ?? null,
            'orgunit_id' => $data['orgunit_id'] ?? null,
            'phone_verified_at' => $data['phone_verified_at'] ?? null,
            'personal_quiz_description' => $data['personal_quiz_description'] ?? '',
        ]);
    }
}
