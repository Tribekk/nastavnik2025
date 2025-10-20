<?php

namespace Domain\User\Actions;

use Domain\Quiz\Models\AvailableQuiz;
use Domain\Quiz\States\Quiz\FinishedQuizState;
use Domain\User\Models\User;

class GetNotResultQuizzesAction
{
    public function run(User $user)
    {
        $result = [];
        $availableQuizzes = AvailableQuiz::with('quiz')
            ->where('user_id', $user->id)
            ->orderBy('quiz_id', 'asc')
            ->get();

        foreach ($availableQuizzes as $availableQuiz) {
            if(!$availableQuiz->state->is(FinishedQuizState::class)) {
                $result[] = $availableQuiz->quiz;
            }
        }

        return $result;
    }
}
