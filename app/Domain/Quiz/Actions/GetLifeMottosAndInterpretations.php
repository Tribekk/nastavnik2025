<?php

namespace Domain\Quiz\Actions;

use Domain\Quiz\Models\Question;
use Domain\Quiz\Models\StudentQuestionnaireResult;

class GetLifeMottosAndInterpretations
{
    public function run(StudentQuestionnaireResult $result): array
    {
        try {
            $question = Question::where('content', 'Какой из предложенных девизов ярче отражает твой жизненный подход, настрой:')
                ->firstOrFail();

            $answers = $result->values()->where('question_id', $question->id)->get();
            $result = [];

            foreach ($answers as $answer) {
                if($answer->answer->is_arbitrary) {
                    $result[] = [
                        'title' => $answer->value,
                        'description' => null,
                    ];
                    break;
                }

                $result[] = [
                    'title' => $answer->answer->answerable->title,
                    'description' => $answer->answer->answerable->description,
                ];
            }

            return $result;
        } catch (\Exception $e) {
            return [];
        }
    }
}
