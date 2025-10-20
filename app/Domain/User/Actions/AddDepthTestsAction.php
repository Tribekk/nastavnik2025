<?php

namespace Domain\User\Actions;

use Domain\Quiz\Models\Quiz;
use Domain\Quiz\States\Quiz\OpenQuizState;
use Domain\User\Models\User;
use Illuminate\Support\Str;

class AddDepthTestsAction
{
    public function run(User $user): void
    {
        $quizzes = Quiz::where('group', 1)->get();

        if(!$user->hasDepthTests()) {
            foreach ($quizzes as $quiz) {
                $user->availableQuizzes()->create([
                    'uuid' => Str::uuid(),
                    'quiz_id' => $quiz->id,
                    'state' => OpenQuizState::class
                ]);
            }
        }
    }
}
