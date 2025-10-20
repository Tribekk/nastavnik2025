<?php
/** @noinspection PhpUnused */

namespace Domain\Quiz\Models;

use Domain\User\Actions\GetAnsweredQuestionCount;
use Domain\User\Actions\ValidateAnsweredQuestions;
use Domain\User\Models\User;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Log;
use Support\Model;

/**
 * @property hasMany questions
 * @property hasMany userAnswers
 * @property int id
 * @property string uuid
 * @property string slug
 * @property string title
 * @property int minutes
 * @property int questionCount
 */
class Quiz extends Model
{
    private $validatorAnsweredQuestions;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        try {
            $this->validatorAnsweredQuestions = app()->make(ValidateAnsweredQuestions::class);
        } catch (BindingResolutionException $e) {
            Log::error($e->getMessage());
        }
    }

    public function questions(): hasMany
    {
        return $this->hasMany(Question::class);
    }

    public function userAnswers()
    {
        return $this->hasMany(UserAnswer::class, 'quiz_id');
    }

    public function getQuestionCountAttribute(): int
    {
        return $this->questions->count();
    }

    public function answeredQuestionCount(User $user)
    {
        $this->validatorAnsweredQuestions->run($this, $user);
        return $this->validatorAnsweredQuestions->answeredQuestionCount();
    }

    public function filledPercentage(User $user)
    {
        if ($this->questionCount == 0) {
            return 0;
        }

        return round($this->answeredQuestionCount($user) / $this->questionCount * 100);
    }

    /**
     * Возвращает true если данный тест является тестом на выбор подходящей профессии
     *
     * @return bool
     */
    public function isSuitableProfessions(): bool
    {
        return $this->slug === 'suitable-professions';
    }

    /**
     * Возвращает true если это тест
     *
     * @return bool
     */
    public function isTest(): bool
    {
        return $this->type === 'test';
    }

    /**
     * Возвращает true если это анкета
     *
     * @return bool
     */
    public function isForm(): bool
    {
        return $this->type === 'form';
    }
}
