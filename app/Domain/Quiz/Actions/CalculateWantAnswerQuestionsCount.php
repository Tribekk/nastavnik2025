<?php

namespace Domain\Quiz\Actions;


use Domain\Quiz\Models\QuestionType;
use Domain\Quiz\Models\Quiz;
use Domain\Quiz\Models\UserAnswer;
use Domain\User\Models\User;

class CalculateWantAnswerQuestionsCount
{
    public function run(User $user, Quiz $quiz): int
    {
        $count = 0;

        $typeSelectCity = QuestionType::where('code', 'select_city')->first()->id;
        $typeText = QuestionType::where('code', 'text')->first()->id;

        $questions = $quiz->questions;
        foreach ($questions as $question) {
            if(!$question->isRequiredQuestion($user->id) && $question->required) {
                continue;
            }

            if($question->required) {
                $questionAnswer = UserAnswer::query()
                    ->where('question_id', $question->id)
                    ->where('quiz_id', $quiz->id)
                    ->where('user_id', $user->id)->first();

                if(empty($questionAnswer)) {
                    $count++;
                } else if(
                    (
                        $questionAnswer->answer->is_arbitraty ||
                        $question->type_id == $typeText ||
                        $question->type_id == $typeSelectCity
                    ) &&
                    (
                        $questionAnswer->value == null ||
                        $questionAnswer->value == ""
                    )
                ) {
                    $count++;
                }
            }
        }

        return $count;
    }
}
