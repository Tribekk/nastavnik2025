<?php

namespace Domain\Quiz\Actions;

use DB;
use Domain\Quiz\Models\AvailableQuiz;
use Domain\Quiz\Models\UserAnswer;
use Domain\Quiz\States\Quiz\OpenQuizState;
use Domain\User\Models\User;

class OpenQuizAction
{
    public function run(User $user, AvailableQuiz $availableQuiz): void
    {
        DB::transaction(function () use ($user, $availableQuiz) {
            UserAnswer::query()
                ->where('user_id', $user->id)
                ->where('quiz_id', $availableQuiz->quiz->id)
                ->delete();

            $availableQuiz->update([
                'state' => OpenQuizState::class,
                'finished_at' => null
            ]);
        });
    }
}
