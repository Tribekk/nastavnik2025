<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Domain\Quiz\Models\ProfessionalTypeResult;
use Domain\User\Models\User;
use Faker\Generator as Faker;

$factory->define(ProfessionalTypeResult::class, function (Faker $faker) {
    return [
        'uuid' => Str::uuid(),
        'user_id' => factory(User::class),
        'reliability' => $faker->numberBetween(0, 100),
    ];
});
