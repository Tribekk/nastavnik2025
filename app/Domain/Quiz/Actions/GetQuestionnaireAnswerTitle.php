<?php

namespace Domain\Quiz\Actions;

use Domain\Quiz\Models\Question;
use Domain\Quiz\Models\QuestionType;

class GetQuestionnaireAnswerTitle
{
    function run($result, string $content): string {
        try {
            $question = Question::where('content', $content)
                ->firstOrFail();

            $value = $result->values()->where('question_id', $question->id)->firstOrFail();
            $textType = QuestionType::where('code', 'text')->first()->id;

            return ($question->type_id == $textType || $value->answer->is_arbitrary) ?
                $value->value :
                $value->answer->title;

        } catch (\Exception $exception) {
            return "";
        }
    }
}
