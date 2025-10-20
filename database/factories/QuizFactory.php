<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Domain\Quiz\Models\Quiz;
use Faker\Generator as Faker;

$factory->define(Quiz::class, function (Faker $faker) {
    return [
        'uuid' => Str::uuid(),
        'slug' => $faker->word,
        'title' => $faker->sentence,
        'description' => $faker->sentences('6', true)
    ];
});
