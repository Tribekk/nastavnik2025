<?php

namespace App\Quiz\Wrappers;

use Illuminate\Database\Eloquent\Collection;

class QuestionnaireResultWrapper
{
    /**
     * Результат анкетирования
     * @var $result
     */
    protected $result;

    /**
     * Инициализация $result
     * @param $result
     */
    public function __construct($result)
    {
        $this->result = $result;
    }

    /**
     * Возвращает resultValues
     * @param int $questionId
     * @return Collection
     */
    public function questionValues(int $questionId)
    {
        return $this->result
            ->values()
            ->where('question_id', $questionId)
            ->get();
    }

    /**
     * Возвращает resultValue произвольного ответа
     * @param int $questionId
     * @return mixed
     */
    public function questionArbitraryAnswer(int $questionId)
    {
        return $this->result
            ->values()
            ->where('question_id', $questionId)
            ->whereHas('question', function ($q) {
                $q->where('with_an_arbitrary_answer', 1);
            })->first();
    }
}
