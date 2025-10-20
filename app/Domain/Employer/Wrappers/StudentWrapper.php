<?php

namespace Domain\Employer\Wrappers;

use Domain\Quiz\Models\Question;
use Domain\User\Models\User;

class StudentWrapper
{
    public function typeThinking(User $user)
    {
        $result = $user->typeOfThinkingResult;
        if(empty($result)) return [];

        return $result->values()->where('value', '>', 3)->get();
    }

    public function parentsImagineFeature(User $user)
    {
        $parents = $user->observers;
        if(empty($parents)) return [];

        $question = Question::where('content', 'Какое будущее Вы видите идеальным для ребенка?')
            ->firstOrFail();

        $result = [];
        foreach ($parents as $parent) {
            $questionnaireResult = $parent->user->parentQuestionnaireResult;
            if($questionnaireResult) {
                $values = $questionnaireResult->values()->where('question_id', $question->id)->get();
                foreach ($values as $value) {
                    $result[$parent->id]['imagine'][] = $value->answer->title;
                }
                $result[$parent->id]['parent'] = $parent->user;
            } else {
                $result[$parent->id]['imagine'] = [];
            }
        }

        return $result;
    }

    public function percentConformityPersonType(User $user)
    {
        if(!$user->professionalTypeResult) return null;

        $personTypes = $user->personTypes();
        if(!$personTypes->count()) return null;

        return floor(100 / 5 * $personTypes->first()->value);
    }
}
