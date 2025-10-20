<?php

namespace Domain\User\Models;

use Domain\Quiz\Models\AvailableQuiz;
use Domain\Quiz\Models\CharacterTraitResult;
use Domain\Quiz\Models\FactorMotiveOfChoiceResult;
use Domain\Quiz\Models\InclinationResult;
use Domain\Quiz\Models\IntelligenceLevelResult;
use Domain\Quiz\Models\ProfessionalTypeResult;
use Domain\Quiz\Models\SolutionCasesResult;
use Domain\Quiz\Models\StudentQuestionnaireResult;
use Domain\Quiz\Models\SuitableProfessionResult;
use Domain\Quiz\Models\TypeOfThinkingResult;
use Domain\Quiz\States\Quiz\FinishedQuizState;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

trait StudentQuizzes
{
    /**
     * Результат прохождения анкеты "Анкета студента"
     *
     * @return HasOne
     */
    public function studentQuestionnaireResult()
    {
        return $this->hasOne(StudentQuestionnaireResult::class, 'user_id');
    }

    /**
     * Завершена анкета студента или нет
     *
     * @return bool
     */
    public function getStudentQuestionnaireFinishedAttribute(): bool
    {
        return AvailableQuiz::where('user_id', $this->id)
            ->whereHas('quiz', fn($q) => $q->where('slug', 'student-questionnaire'))
            ->where('state', FinishedQuizState::class)->count() != 0;
    }

    /**
     * Результат прохождения теста "Интересы"
     *
     * @return HasOne
     */
    public function professionalTypeResult()
    {
        return $this->hasOne(ProfessionalTypeResult::class, 'user_id');
    }

    /**
     * Завершен тест "Интересы" или нет
     *
     * @return bool
     */
    public function getInterestsQuizFinishedAttribute(): bool
    {
        return AvailableQuiz::where('user_id', $this->id)
                ->whereHas('quiz', fn($q) => $q->where('slug', 'interests'))
                ->where('state', FinishedQuizState::class)->count() != 0;
    }

    /**
     * Результат прохождения теста "Особенности характера"
     *
     * @return HasOne
     */
    public function characterTraitResult()
    {
        return $this->hasOne(CharacterTraitResult::class, 'user_id');
    }

    /**
     * Завершен тест "Особенности характера" или нет
     *
     * @return bool
     */
    public function getCharacterTraitQuizFinishedAttribute(): bool
    {
        return AvailableQuiz::where('user_id', $this->id)
                ->whereHas('quiz', fn($q) => $q->where('slug', 'traits'))
                ->where('state', FinishedQuizState::class)->count() != 0;
    }

    /**
     * Результат прохождения теста "Подходящие профессии"
     *
     * @return HasOne
     */
    public function suitableProfessions()
    {
        return $this->hasOne(SuitableProfessionResult::class, 'user_id');
    }

    /**
     * Завершен тест "Подходящие профессии" или нет
     *
     * @return bool
     */
    public function getSuitableProfessionsQuizFinishedAttribute(): bool
    {
        return AvailableQuiz::where('user_id', $this->id)
                ->whereHas('quiz', fn($q) => $q->where('slug', 'suitable-professions'))
                ->where('state', FinishedQuizState::class)->count() != 0;
    }

    /**
     * Возвращает коллекцию значений типажа по итогам теста "интересы"
     * @return Collection
     */
    public function personTypes()
    {
        $results = new Collection();

        try {
            if(!$this->interestsQuizFinished) return new Collection();

            $professionalTypeValues = $this->professionalTypeResult
                ->values()->orderBy('value', 'desc')->get();

            $prevItem = null;
            foreach ($professionalTypeValues as $professionalTypeValue) {
                if(!empty($prevItem) && $prevItem->value != $professionalTypeValue->value || $professionalTypeValue->value == 0) {
                    break;
                }

                $prevItem = $professionalTypeValue;
                $results->add($professionalTypeValue);
            }
        } catch (\Exception $exception) {
            return new Collection();
        }

        return $results;
    }

    /**
     * Имеет ли пользователь глубинный тест
     *
     * @return bool
     */
    public function hasDepthTests(): bool
    {
        return AvailableQuiz::where('user_id', $this->id)
                ->whereHas('quiz', function($q) {
                    $q->where('group', 1);
                })->count() > 0;
    }

    /**
     * Закончил ли глубинный тест
     *
     * @return bool
     */
    public function getFinishedDepthTestsAttribute(): bool
    {
        return $this->hasDepthTests() && AvailableQuiz::where('user_id', $this->id)
                ->whereHas('quiz', function($q) {
                    $q->where('group', 1);
                })->where('state', '!=', FinishedQuizState::class)
                ->count() == 0;
    }

    /**
     * Закончил ли базовый тест + анкета
     *
     * @return bool
     */
    public function getFinishedBaseTestsAttribute(): bool
    {
        return AvailableQuiz::where('user_id', $this->id)
                ->whereHas('quiz', function($q) {
                    $q->where('group', 0);
                })->where('state', '!=', FinishedQuizState::class)
                ->count() == 0;
    }

    /**
     * Результат факторы мотива выбора профессии (анкета студента)
     *
     * @return HasMany
     */
    public function factorMotiveOfChoiceResult()
    {
        return $this->hasMany(FactorMotiveOfChoiceResult::class, 'user_id');
    }

    /**
     * Результаты теста "склонности"
     *
     * @return HasOne
     */
    public function inclinationResult()
    {
        return $this->hasOne(InclinationResult::class, 'user_id');
    }

    /**
     * Завершен тест "Подходящие профессии" или нет
     *
     * @return bool
     */
    public function getInclinationQuizFinishedAttribute(): bool
    {
        return AvailableQuiz::where('user_id', $this->id)
                ->whereHas('quiz', fn($q) => $q->where('slug', 'inclinations'))
                ->where('state', FinishedQuizState::class)->count() != 0;
    }

    /**
     * Результаты теста "Общий уровень интеллекта"
     *
     * @return HasOne
     */
    public function intelligenceLevelResult()
    {
        return $this->hasOne(IntelligenceLevelResult::class, 'user_id');
    }

    /**
     * Завершен тест "Общий уровень интеллекта" или нет
     *
     * @return bool
     */
    public function getIntelligenceLevelQuizFinishedAttribute(): bool
    {
        return AvailableQuiz::where('user_id', $this->id)
                ->whereHas('quiz', fn($q) => $q->where('slug', 'intelligence-level'))
                ->where('state', FinishedQuizState::class)->count() != 0;
    }

    /**
     * Результаты теста "Тип мышления"
     *
     * @return HasOne
     */
    public function typeOfThinkingResult($quiz_id=0)
    {
        if (!empty($quiz_id))
            return $this->hasOne(TypeOfThinkingResult::class, 'user_id')->where('quiz_id', $quiz_id)->first();

        return $this->hasOne(TypeOfThinkingResult::class, 'user_id');
    }

    /**
     * Завершен тест "Общий уровень интеллекта" или нет
     *
     * @return bool
     */
    public function getTypeThinkingQuizFinishedAttribute($quiz_id=0): bool
    {
        if (!empty($quiz_id)){
            return AvailableQuiz::where('user_id', $this->id)
                    ->whereHas('quiz', fn($q) => $q->where('slug', 'type-of-thinking'))
                    ->where('quiz_id', $quiz_id)
                    ->where('state', FinishedQuizState::class)->count() != 0;
        }

        return AvailableQuiz::where('user_id', $this->id)
                ->whereHas('quiz', fn($q) => $q->where('slug', 'type-of-thinking'))
                ->where('state', FinishedQuizState::class)->count() != 0;
    }

    /**
     * Результаты теста "Решение кейсов"
     *
     * @return HasOne
     */
    public function solutionOfCasesResult()
    {
        return $this->hasOne(SolutionCasesResult::class, "user_id");
    }

    /**
     * Завершен тест "Общий уровень интеллекта" или нет
     *
     * @return bool
     */
    public function getSolutionCasesQuizFinishedAttribute(): bool
    {
        return AvailableQuiz::where('user_id', $this->id)
                ->whereHas('quiz', fn($q) => $q->where('slug', 'solution_of_cases'))
                ->where('state', FinishedQuizState::class)->count() != 0;
    }

    /**
     * Количество завершенных тестов
     *
     * @return int
     */
    public function getCountFinishedTestsAttribute(): int
    {
        return AvailableQuiz::where('user_id', $this->id)
            ->whereHas('quiz', function($q) {
                $q->where('type', 'test');
            })->where('state', FinishedQuizState::class)->count();
    }

    /**
     * Количество незавершенных базовых тестов
     *
     * @return int
     */
    public function getCountNotFinishedBaseTestsAttribute(): int
    {
        return AvailableQuiz::where('user_id', $this->id)
            ->whereHas('quiz', function($q) {
                $q->where('group', 0)
                    ->where('type', 'test');
            })->where('state', '!=', FinishedQuizState::class)->count();
    }

    /**
     * Количество незавершенных глубинных тестов
     *
     * @return int
     */
    public function getCountNotFinishedDepthTestsAttribute(): int
    {
        return AvailableQuiz::where('user_id', $this->id)
            ->whereHas('quiz', function($q) {
                $q->where('group', 1);
            })->where('state', '!=', FinishedQuizState::class)->count();
    }
}
