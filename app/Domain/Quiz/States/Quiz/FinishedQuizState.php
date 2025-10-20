<?php


namespace Domain\Quiz\States\Quiz;


class FinishedQuizState extends QuizState
{
    public function code(): string
    {
        return 'finished';
    }

    public function color(): string
    {
        return 'success';
    }

    public function fillable(): bool
    {
        return false;
    }

    public function title(): string
    {
        return __('Пройден');
    }

    public function initial(): bool
    {
        return false;
    }
}
