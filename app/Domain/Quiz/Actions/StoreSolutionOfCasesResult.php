<?php

namespace Domain\Quiz\Actions;

use Domain\Quiz\Models\Quiz;
use Domain\Quiz\Models\SituationInterpretation;
use Domain\Quiz\Models\SolutionCasesResult;
use Domain\Quiz\Models\SolutionCasesResultValue;
use Domain\Quiz\Models\UserAnswer;
use Domain\User\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StoreSolutionOfCasesResult
{
    public function run(User $user): ?SolutionCasesResult
    {
        DB::transaction(function () use ($user, &$result) {
            $quiz = Quiz::where('slug', 'solution_of_cases')->firstOrFail();
            SolutionCasesResult::where('user_id', $user->id)->delete();

            $result = SolutionCasesResult::create([
                'uuid' => Str::uuid(),
                'user_id' => $user->id,
            ]);

            $answers = UserAnswer::where('user_id', $user->id)
                ->where('quiz_id', $quiz->id)
                ->whereNull('deleted_at')->get();

            foreach ($answers as $answer) {
                $interpretation = SituationInterpretation::where('id', $answer->answer->answerable_id)->firstOrFail();

                $description = null;
                if($interpretation->situation->title === "Ситуация 3") {
                   $description = $interpretation->situation_answer == 1 ?
                       "Тебе часто характерны" :
                       "В данном случае у тебя проявлена";
                } else if($interpretation->situation->title === "Ситуация 4") {
                    $description = "Ты выбираешь позицию";
                }

                SolutionCasesResultValue::create([
                    'uuid' => Str::uuid(),
                    'result_id' => $result->id,
                    'situation_id' => $interpretation->situation_id,
                    'situation_answer' => $interpretation->situation_answer,
                    'description' => $description,
                    'interpretation_id' => $interpretation->id,
                ]);
            }
        });

        return $result;
    }
}
