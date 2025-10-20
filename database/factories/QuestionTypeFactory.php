<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Domain\Quiz\Models\QuestionType;
use Faker\Generator as Faker;

$factory->define(QuestionType::class, function (Faker $faker) {
    return [
        'uuid' => Str::uuid(),
        'code' => $faker->word,
        'title' => $faker->sentence
    ];
});
