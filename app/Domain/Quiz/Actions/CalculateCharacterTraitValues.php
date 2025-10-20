<?php


namespace Domain\Quiz\Actions;


use Domain\Quiz\Models\CharacterTrait;
use Domain\Quiz\Models\Quiz;
use Domain\Quiz\Models\UserAnswer;
use Domain\User\Models\User;

class CalculateCharacterTraitValues
{
    public function run(User $user): array
    {
        $quiz = Quiz::query()
            ->where('slug', 'traits')
            ->firstOrFail();

        $traits = CharacterTrait::all();

        $values = array();

        foreach ($traits as $trait) {
            $values[$trait->code] = 0;
        }

        /** @noinspection PhpPossiblePolymorphicInvocationInspection */
        $userAnswers = UserAnswer::query()
            ->where('user_id', $user->id)
            ->where('quiz_id', $quiz->id)
            ->whereNull('deleted_at')
            ->get();

        foreach ($userAnswers as $userAnswer) {
            $values[$userAnswer->question->questionable->code] += $userAnswer->answer->value;
        }

        return $values;
    }
}
