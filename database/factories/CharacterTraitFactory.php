<?php

/** @var Factory $factory */

use Domain\Quiz\Models\CharacterTrait;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(CharacterTrait::class, function (Faker $faker) {
    return [
        'uuid' => Str::uuid(),
        'code' => $faker->word,
        'dividing_score' => $faker->numberBetween(1, 8),
        'lower_value' => $faker->word,
        'higher_value' => $faker->word,
        'lower_description' => $faker->text(32),
        'higher_description' => $faker->text,
    ];
});
