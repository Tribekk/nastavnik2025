<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Domain\User\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


$factory->define(User::class, function (Faker $faker) {
    $faker->locale('ru_RU');

    $gender = $faker->randomElement(['male', 'female']);

    return [
        'uuid' => Str::uuid(),
        'first_name' => $faker->firstName($gender),
        'last_name' => $faker->lastName($gender),
        'middle_name' => $faker->boolean(85) ? $faker->firstName($gender) : null,
        'birth_date' => $faker->dateTimeBetween($startDate = '-30 years', $endDate = '-10 years'),
        'sex' => $gender == 'male' ? 1 : 2,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'phone' => $faker->e164PhoneNumber,
        'phone_verified_at' => $faker->boolean(85) ? now() : null,
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
        'api_token' => $faker->boolean(50) ? Str::random(80) : null,
    ];
});
