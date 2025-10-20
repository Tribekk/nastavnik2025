<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Domain\Admin\Models\LoyaltyLevel;
use Domain\Admin\Models\School;
use Domain\Admin\Models\TypeEducationalOrganization;
use Faker\Generator as Faker;

$factory->define(School::class, function (Faker $faker) {
    return [
        'uuid' => Str::uuid(),
        'title' => $faker->words(5, true),
        'short_title' => $faker->boolean(70)
            ? $faker->word
            : null,
        'address' => $faker->boolean(70)
            ? $faker->address
            : null,
        'number' => $faker->randomNumber(),
        'director' => $faker->boolean(70)
            ? $faker->name
            : null,
        'phone' => $faker->boolean(70)
            ? $faker->phoneNumber
            : null,
        'email' => $faker->boolean(70)
            ? $faker->email
            : null,
        'type_of_educational_organization_id' => TypeEducationalOrganization::inRandomOrder()->first(),
        'loyalty_level_id' => $faker->boolean(70)
            ? LoyaltyLevel::inRandomOrder()->first()
            : null,
        'token' => $faker->numerify('####-####'),
    ];
});
