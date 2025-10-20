<?php

namespace Domain\Quiz\Actions;

use Domain\Quiz\Models\TypeOfThinking;
use Domain\Quiz\Models\TypeOfThinkingManifestation;
use Domain\Quiz\Models\TypeOfThinkingResult;
use Domain\Quiz\Models\TypeOfThinkingResultValue;
use Domain\User\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StoreTypeOfThinkingResult
{
    protected CalculateTypeOfThinkingValues $calculateValues;

    public function __construct()
    {
        $this->calculateValues = app()->make(CalculateTypeOfThinkingValues::class);
    }

    public function run(User $user, $quiz): ?TypeOfThinkingResult
    {
        DB::transaction(function () use ($user, &$result, $quiz) {
            TypeOfThinkingResult::where('user_id', $user->id)->where('quiz_id', $quiz->id)->delete();

            $values = $this->calculateValues->run($user, $quiz);

            $percentages = array_column($values, 'percentage');
            $average = count($percentages) > 0 ? round(array_sum($percentages) / count($percentages)) : 0;

            $average_all = 0;
            if ($quiz->id === 13){
                $other_quiz = clone $quiz;
                $other_quiz->id = 3;
                $other_quiz_values = $this->calculateValues->run($user, $other_quiz);
                $other_percentages = array_column($other_quiz_values, 'percentage');
                $other_percentages = array_merge($other_percentages, $percentages);

                $average_all = count($other_percentages) > 0 ? round(array_sum($other_percentages) / count($other_percentages)) : 0;

            }elseif ($quiz->id === 3){
                $other_quiz = clone $quiz;
                $other_quiz->id = 13;
                $other_quiz_values = $this->calculateValues->run($user, $other_quiz);
                $other_percentages = array_column($other_quiz_values, 'percentage');
                $other_percentages = array_merge($other_percentages, $percentages);

                $average_all = count($other_percentages) > 0 ? round(array_sum($other_percentages) / count($other_percentages)) : 0;
            }


            $result = TypeOfThinkingResult::create([
                'uuid' => Str::uuid(),
                'user_id' => $user->id,
                'quiz_id' => $quiz->id,
                'age' => $average,
                'age_all' => $average_all
            ]);



            foreach ($values as $key => $value) {
                $type = TypeOfThinking::where('uuid', $key)->firstOrFail();
                if ($quiz->id === 13){
                    $value_range = TypeOfThinkingManifestation::takeStringRangePercentages($average);
                }else{
                    $value_range = TypeOfThinkingManifestation::takeStringRangePercentages($value['percentage']);
                }

                $manifestation = TypeOfThinkingManifestation::where('value_range', $value_range)
                    ->where('type_id', $type->id)->first();

                TypeOfThinkingResultValue::create([
                    'uuid' => Str::uuid(),
                    'result_id' => $result->id,
                    'type_id' => $type->id,
                    'manifestation_id' => $manifestation->id,
                    'is_higher' => $value['is_higher'],
                    'value' => $value['score'],
                    'percentage' => $value['percentage'],
                ]);
            }
        });

        return $result;
    }
}
