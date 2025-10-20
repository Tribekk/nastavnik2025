<?php

namespace Domain\User\Models;

use Domain\Quiz\Models\AvailableQuiz;
use Domain\Quiz\Models\ParentQuestionnaireResult;
use Domain\Quiz\States\Quiz\FinishedQuizState;
use Illuminate\Database\Eloquent\Relations\HasOne;

trait ParentQuizzes
{
    /**
     * Результат прохождения анкеты "Анкета родителя"
     *
     * @return HasOne
     */
    public function parentQuestionnaireResult()
    {
        return $this->hasOne(ParentQuestionnaireResult::class, 'user_id');
    }

    /**
     * Завершена анкета студента или нет
     *
     * @return bool
     */
    public function getParentQuestionnaireFinishedAttribute(): bool
    {
        return AvailableQuiz::where('user_id', $this->id)
            ->whereHas('quiz', fn($q) => $q->where('slug', 'parent-questionnaire'))
            ->where('state', FinishedQuizState::class)->count() != 0;
    }
}
