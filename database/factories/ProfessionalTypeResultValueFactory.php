<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Domain\Quiz\Models\ProfessionalType;
use Domain\Quiz\Models\ProfessionalTypeResult;
use Domain\Quiz\Models\ProfessionalTypeResultValue;
use Faker\Generator as Faker;

$factory->define(ProfessionalTypeResultValue::class, function (Faker $faker) {
    return [
        'uuid' => Str::uuid(),
        'result_id' => factory(ProfessionalTypeResult::class),
        'type_id' => ProfessionalType::all()->random(),
        'value' => $faker->numberBetween(0, 4),
    ];
});
