<?php

namespace Domain\Quiz\Models;

use Domain\User\Models\User;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Support\Model;

/**
 * @property mixed givenAnswers
 */
class Question extends Model
{
    protected $guarded = [];

    public function questionable(): MorphTo
    {
        return $this->morphTo();
    }

    public function answers(): HasMany
    {
        $query = $this->hasMany(Answer::class)->where('is_arbitrary', 0);

        $withoutSortQuestions = [
            "Какова вероятность, что ты останешься строить карьеру (любую) в родном городе",
            "Какова вероятность, что Ваш ребенок останется строить карьеру (любую) в родном городе",
            "Оцените общий уровень благополучия Вашей семьи",
            "Ваш общий трудовой стаж?",
            "Какой секцией занимаешься самое продолжительное время - укажи сколько лет",
            "Какой у тебя средний балл?",
            "На рисунке жирными точками показано количество поездок Жени в общественном транспорте в период с 6 до 19 августа. По горизонтали указан день месяца, по вертикали - количество поездок, совершенных Женей в соответствующий день. Для наглядности жирные точки на рисунке соединены линией.<br>Определи по рисунку наименьшее количество поездок, совершенных Женей за день в указанный период."
        ];

        if(in_array($this->content, $withoutSortQuestions)) {
            return $query;
        }


        return $query->orderByRaw('`answers`.`order` desc, `answers`.`title` asc');
    }

    public function arbitraryAnswer()
    {
        return $this->hasOne(Answer::class)->where('is_arbitrary', 1);
    }

    public function givenAnswers(): hasMany
    {
        return $this->hasMany(UserAnswer::class);
    }

    public function userAnswers(User $user)
    {
        return $this->givenAnswers()->whereHas('user', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->get();
    }

    /**
     * Функция возвращает true/false в зависимости от того есть ли ответ(ы) на данный вопрос
     * @param int $userId
     * @return bool
     */
    public function answeredByUser(int $userId): bool
    {
        return UserAnswer::where('question_id', $this->id)
            ->where('user_id', $userId)->count() > 0;
    }

    public function type()
    {
        return $this->belongsTo(QuestionType::class);
    }

    /**
     * Метод true когда на вопрос ответили так-как нужно и false если нет.
     * Используется для сокрытия вопросов зависимых от варианта ответа
     *
     * @param $userId
     * @return bool
     */
    public function isRequiredQuestion(int $userId)
    {
        if(!$this->required_by_question_id) return true;

        return UserAnswer::where('answer_id', $this->required_by_answer_id)
            ->where('user_id', $userId)->count();
    }
}
