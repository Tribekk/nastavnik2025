<?php

namespace Domain\Quiz\Actions;

use Domain\Quiz\Models\Question;
use Domain\Quiz\Models\StudentQuestionnaireResult;

class GetImportantWhenChoosingJob
{
    public function run(StudentQuestionnaireResult $result): array
    {
        try {
            $question = Question::where('content', 'На что ты обратишь внимание при выборе работы? Выбери 5 факторов:')
                ->firstOrFail();

            $answers = $result->values()->where('question_id', $question->id)->get();
            $result = [];

            foreach ($answers as $answer) {
                $result[] = $answer->answer->is_arbitrary ?
                    $answer->value :
                    $answer->answer->title;
            }

            return $result;
        } catch (\Exception $e) {
            return [];
        }
    }
}
