<?php

namespace Domain\Quiz\Actions;

use Domain\Quiz\Models\Inclination;
use Domain\Quiz\Models\InclinationResult;
use Domain\Quiz\Models\InclinationResultValue;
use Domain\Quiz\Models\InclinationType;
use Domain\User\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StoreInclinationResult
{
    protected CalculateInclinationValues $calculateInclinationValues;

    public function __construct()
    {
        $this->calculateInclinationValues = app()->make(CalculateInclinationValues::class);
    }

    public function run(User $user): ?InclinationResult
    {
        DB::transaction(function () use ($user, &$inclinationResult) {
            $uuid = Str::uuid();
            InclinationResult::where('user_id', $user->id)->delete();

            $values = $this->calculateInclinationValues->run($user);

            $inclinationResult = InclinationResult::create([
                'uuid' => $uuid,
                'user_id' => $user->id,
            ]);

            foreach ($values as $key => $value) {
                $inclination = Inclination::where('uuid', $key)->firstOrFail();

                $inclinationType = InclinationType::where('value_range', InclinationType::takeStringRange($value['score']))
                    ->where('inclination_id', $inclination->id)->firstOrFail();

                $percentage = floor((100 / 12) * $value['score']);


                InclinationResultValue::create([
                    'uuid' => Str::uuid(),
                    'result_id' => $inclinationResult->id,
                    'inclination_id' => $inclination->id,
                    'type_id' => $inclinationType->id,
                    'is_higher' => $value['is_higher'],
                    'value' => $value['score'],
                    'percentage' => $percentage,
                ]);
            }
        });

        return $inclinationResult;
    }
}
