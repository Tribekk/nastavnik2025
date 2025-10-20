<?php

namespace Domain\User\Actions;

use Domain\Quiz\Models\Quiz;
use Domain\Quiz\Models\UserAnswer;
use Domain\User\Models\User;

class GetAnsweredQuestionCount
{
    public function run(Quiz $quiz, User $user): int
    {
        return UserAnswer::query()
            ->select('question_id')
            ->distinct()
            ->where('quiz_id', $quiz->id)
            ->where('user_id', $user->id)->get()->count();
    }
}
