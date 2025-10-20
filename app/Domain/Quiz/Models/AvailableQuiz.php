<?php

namespace Domain\Quiz\Models;

use Domain\Quiz\Actions\CalculateWantAnswerQuestionsCount;
use Domain\Quiz\States\Quiz\FinishedQuizState;
use Domain\Quiz\States\Quiz\OpenQuizState;
use Domain\Quiz\States\Quiz\PendingQuizState;
use Domain\Quiz\States\Quiz\QuizState;
use Domain\User\Actions\GetAnsweredQuestionCount;
use Domain\User\Actions\ValidateAnsweredQuestions;
use Domain\User\Models\User;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Support\Facades\Log;
use Spatie\ModelStates\Exceptions\InvalidConfig;
use Spatie\ModelStates\HasStates;
use Support\Model;

/**
 * @property int id
 * @property Quiz quiz
 * @property QuizState state
 * @property User user
 */
class AvailableQuiz extends Model
{
    use HasStates;

    protected $guarded = [];

    protected $casts = [
        'started_at' => 'datetime',
        'finished_at' => 'datetime'
    ];

    protected $with = ['quiz'];

    private $calcAnsweredQuestions;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        try {
            $this->calcAnsweredQuestions = app()->make(GetAnsweredQuestionCount::class);
        } catch (BindingResolutionException $e) {
            Log::error($e->getMessage());
        }
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    public function canBeFinished()
    {
        $action = new ValidateAnsweredQuestions();
        $action->run($this->quiz, $this->user, false);
        $action->validate();

        return $this->quiz->questionCount == $action->correctAnsweredQuestionCount() && $this->state->is(PendingQuizState::class);
    }

    public function canAnsweredAllQuestions()
    {
        $calculateWantAnswerQuestionsCount = new CalculateWantAnswerQuestionsCount();
        $questionCount = $calculateWantAnswerQuestionsCount->run($this->user, $this->quiz);

        return !$questionCount;
    }

    /**
     * Возвращает true если пользователь прошел тест интересы
     * @return bool
     */
    public function interestsQuizFinished(): bool
    {
        return boolval($this->user->professionalTypeResult);
    }

    protected function registerStates(): void
    {
        try {
            $this
                ->addState('state', QuizState::class)
                ->default(OpenQuizState::class)
                ->allowTransition(OpenQuizState::class, PendingQuizState::class)
                ->allowTransition(OpenQuizState::class, FinishedQuizState::class)
                ->allowTransition(PendingQuizState::class, FinishedQuizState::class)
                ->allowTransition(FinishedQuizState::class, PendingQuizState::class);
        } catch (InvalidConfig $e) {
            Log::warning($e->getMessage());
        }
    }
}
