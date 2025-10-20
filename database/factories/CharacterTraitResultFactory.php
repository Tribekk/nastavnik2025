<?php

/** @var Factory $factory */

use Domain\Quiz\Models\CharacterTraitResult;
use Domain\User\Models\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(CharacterTraitResult::class, function (Faker $faker) {
    return [
        'uuid' => Str::uuid(),
        'user_id' => factory(User::class),
        'reliability' => $faker->numberBetween(0, 10),
    ];
});
