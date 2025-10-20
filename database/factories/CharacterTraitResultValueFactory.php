<?php

/** @var Factory $factory */

use Domain\Quiz\Models\CharacterTrait;
use Domain\Quiz\Models\CharacterTraitResult;
use Domain\Quiz\Models\CharacterTraitResultValue;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(CharacterTraitResultValue::class, function (Faker $faker) {
    return [
        'uuid' => Str::uuid(),
        'trait_id' => factory(CharacterTrait::class),
        'trait_result_id' => factory(CharacterTraitResult::class),
        'title' => $faker->sentence,
        'is_higher' => $faker->boolean,
        'percentage' => $faker->numberBetween(0,100),
        'chart_percentage' => $faker->numberBetween(0,100),
        'description' => $faker->text,
    ];
});
