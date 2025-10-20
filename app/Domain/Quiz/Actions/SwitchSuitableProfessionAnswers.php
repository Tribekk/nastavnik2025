<?php

declare(strict_types=1);

namespace Domain\Quiz\Actions;

use Domain\Quiz\Models\Quiz;
use Domain\Quiz\Models\UserAnswer;
use Domain\User\Models\User;
use Str;

class SwitchSuitableProfessionAnswers
{
    /**
     * Переключает ответ пользователя на один из вопросов в тесте "Подходящие профессии"
     *
     * @param User $user
     * @param Quiz $quiz
     * @param int $questionId
     * @param int $answerId
     * @return void
     */
    public function run(User $user, Quiz $quiz, int $questionId, int $answerId): void
    {
        $userAnswer = UserAnswer::query()
            ->where('user_id', $user->id)
            ->where('question_id', $questionId)
            ->where('answer_id', $answerId)
            ->first();

        if (is_null($userAnswer)) {
            UserAnswer::query()
                ->where('user_id', $user->id)
                ->where('question_id', $questionId)
                ->delete();

            UserAnswer::create([
                'uuid' => Str::uuid(),
                'user_id' => $user->id,
                'quiz_id' => $quiz->id,
                'question_id' => $questionId,
                'answer_id' => $answerId
            ]);
        }
    }
}
