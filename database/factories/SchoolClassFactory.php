<?php

/** @var Factory $factory */

use Domain\Admin\Models\School;
use Domain\Admin\Models\SchoolClass;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(SchoolClass::class, function (Faker $faker) {
    return [
        'school_id' => School::inRandomOrder()->first(),
        'number' => $faker->randomNumber(),
        'letter' => $faker->randomLetter,
    ];
});
