<?php

namespace Domain\User\Actions;

use Domain\Quiz\Models\Quiz;
use Domain\Quiz\States\Quiz\OpenQuizState;
use Domain\User\Catalogs\BaseUserRole\UserBaseRoleCatalog;
use Domain\User\Models\User;
use Illuminate\Support\Str;

class AddAvailableQuizzesAction
{
    public function run(User $user, UserBaseRoleCatalog $role): void
    {
        $quizzes = Quiz::whereIn('slug', $role->availableQuizzes())->get();

        foreach ($quizzes as $quiz) {
            $user->availableQuizzes()->create([
                'uuid' => Str::uuid(),
                'quiz_id' => $quiz->id,
                'state' => OpenQuizState::class
            ]);
        }
    }
}
