<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Domain\Quiz\Models\CharacterTrait;
use Domain\Quiz\Models\Question;
use Domain\Quiz\Models\QuestionType;
use Domain\Quiz\Models\Quiz;
use Faker\Generator as Faker;

$factory->define(Question::class, function (Faker $faker) {
    return [
        'uuid' => Str::uuid(),
        'quiz_id' => factory(Quiz::class),
        'type_id' => factory(QuestionType::class),
        'content' => $faker->sentences(5, true),
        'questionable_type' => CharacterTrait::class,
        'questionable_id' => $faker->randomDigit
    ];
});
