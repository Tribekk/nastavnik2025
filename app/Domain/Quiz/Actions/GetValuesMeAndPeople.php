<?php

namespace Domain\Quiz\Actions;

use Domain\Quiz\Models\Question;
use Domain\Quiz\Models\StudentQuestionnaireResult;

class GetValuesMeAndPeople
{
    public function run(StudentQuestionnaireResult $result): array
    {
        try {
            $question = Question::where('content', 'Выберите 4 главных характеристики современного человека, он должен быть:')
                ->firstOrFail();

            $answers = $result->values()->where('question_id', $question->id)->get();
            $result = [];

            foreach ($answers as $answer) {
                if($answer->answer->is_arbitrary) {
                    $result[] = [
                        'title' => $answer->value,
                        'description' => null,
                    ];
                } else {
                    $result[] = [
                        'title' => $answer->answer->answerable->title,
                        'description' => $answer->answer->answerable->description,
                    ];
                }
            }

            return $result;
        } catch (\Exception $e) {
            return [];
        }
    }
}
