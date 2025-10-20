<?php

namespace Domain\Quiz\Actions;

use DB;
use Domain\Quiz\Models\ProfessionalType;
use Domain\Quiz\Models\ProfessionalTypeResult;
use Domain\Quiz\Models\ProfessionalTypeResultValue;
use Domain\User\Models\User;
use Str;

class StoreTypeCalculatorResults
{
    protected CalculateProfessionalTypeValues $professionalTypeCalculator;

    protected CalculateProfessionalTypeAnswersReliability $unreliabilityCalculator;

    public function __construct()
    {
        $this->professionalTypeCalculator = app()->make(CalculateProfessionalTypeValues::class);

        $this->unreliabilityCalculator = app()->make(CalculateProfessionalTypeAnswersReliability::class);
    }

    public function run(User $user): void
    {
        DB::transaction(function () use ($user) {

            ProfessionalTypeResult::where('user_id', $user->id)->delete();

            $values = $this->professionalTypeCalculator->run($user);

            $result = ProfessionalTypeResult::create([
                'uuid' => Str::uuid(),
                'user_id' => $user->id,
                'reliability' => $this->unreliabilityCalculator->run($user)
            ]);


            foreach ($values as $key => $value) {
                $uuid = Str::uuid();

                $type = ProfessionalType::where('uuid', $key)->first();

                ProfessionalTypeResultValue::create([
                    'uuid' => $uuid,
                    'result_id' => $result->id,
                    'type_id' => $type->id,
                    'value' => $value
                ]);
            }
        });
    }
}
