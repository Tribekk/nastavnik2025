<?php

namespace Domain\Quiz\Actions;

use Domain\Quiz\Models\FactorMotiveOfChoiceResult;
use Domain\Quiz\Models\FactorMotivesOfChoice;
use Domain\Quiz\Models\Question;
use Domain\Quiz\Models\Quiz;
use Domain\Quiz\Models\UserAnswer;
use Domain\User\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StoreFactorMotiveOfChoiceResult
{
    public function run(User $user): Collection
    {
        DB::transaction(function () use ($user) {
            FactorMotiveOfChoiceResult::where('user_id', $user->id)->delete();

            $quiz = Quiz::query()
                ->where('slug', 'student-questionnaire')
                ->firstOrFail();


            $question = Question::where('quiz_id', $quiz->id)->where('content', 'Что тебе важно иметь в будущей деятельности? Выбери 7 главных ценностей, что направят твой выбор:')->firstOrFail();
            $answers = UserAnswer::query()
                ->with('answer')
                ->where('user_id', $user->id)
                ->where('question_id', $question->id)
                ->whereNull('deleted_at')->get();

            $factorValues = [
                [
                    'factor_id' => FactorMotivesOfChoice::where('title', 'Самореализация')->firstOrFail()->id,
                    'values' => [6,7,9,13],
                    'score' => 0,
                ],
                [
                    'factor_id' => FactorMotivesOfChoice::where('title', 'Заработок')->firstOrFail()->id,
                    'values' => [3,5,6,10],
                    'score' => 0,
                ],
                [
                    'factor_id' => FactorMotivesOfChoice::where('title', 'Карьера')->firstOrFail()->id,
                    'values' => [2,15,19,20],
                    'score' => 0,
                ],
                [
                    'factor_id' => FactorMotivesOfChoice::where('title', 'Альтруизм')->firstOrFail()->id,
                    'values' => [1,14,18,21],
                    'score' => 0,
                ],
                [
                    'factor_id' => FactorMotivesOfChoice::where('title', 'Условия труда')->firstOrFail()->id,
                    'values' => [1,3,5,23],
                    'score' => 0,
                ],
                [
                    'factor_id' => FactorMotivesOfChoice::where('title', 'Самостоятельность')->firstOrFail()->id,
                    'values' => [4,7,11,22],
                    'score' => 0,
                ],
                [
                    'factor_id' => FactorMotivesOfChoice::where('title', 'Общение')->firstOrFail()->id,
                    'values' => [1,12,16,17],
                    'score' => 0,
                ],
                [
                    'factor_id' => FactorMotivesOfChoice::where('title', 'Стабильность')->firstOrFail()->id,
                    'values' => [3,5,8,23],
                    'score' => 0,
                ],
            ];


            // калькулирование набранных очков по каждому фактору

            foreach ($answers as $answer) {
                foreach ($factorValues as $k => $factorValue) {
                    if (in_array($answer->answer->value, $factorValue['values'])) {
                        $factorValues[$k]['score']++;
                    }
                }
            }

            // сохранение и расчет процентов к каждому фактору
            foreach ($factorValues as $factorValue) {
                $percentage = floor((100 / count($factorValue['values'])) * $factorValue['score']);

                /**
                 * Сохранение результатов мотивов выбора
                 * @var FactorMotiveOfChoiceResult $result
                 */
                FactorMotiveOfChoiceResult::create([
                    'uuid' => Str::uuid(),
                    'user_id' => $user->id,
                    'factor_id' => $factorValue['factor_id'],
                    'percentage' => $percentage,
                    'score' => $factorValue['score'],
                ]);
            }
        });

        return $user->factorMotiveOfChoiceResult;
    }
}
