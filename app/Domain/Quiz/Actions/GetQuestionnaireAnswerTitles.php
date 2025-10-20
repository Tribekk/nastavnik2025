<?php

namespace Domain\Quiz\Actions;

use Domain\Quiz\Models\Question;
use Domain\Quiz\Models\QuestionType;

class GetQuestionnaireAnswerTitles
{
    function run($result, string $content): array {
        try {
            $titles = [];

            $question = Question::where('content', $content)
                ->firstOrFail();
            $textType = QuestionType::where('code', 'text')->first()->id;

            $values = $result->values()->where('question_id', $question->id)->get();

            foreach ($values as $value) {
                $titles[] = ($question->type_id == $textType || $value->answer->is_arbitrary) ?
                    $value->value :
                    $value->answer->title;
            }

            return $titles;
        } catch (\Exception $exception) {
            return [];
        }
    }
}
