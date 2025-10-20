<?php


namespace Domain\Quiz\States\Quiz;


class OpenQuizState extends QuizState
{
    public function code(): string
    {
        return 'open';
    }

    public function color(): string
    {
        return 'gray-500';
    }

    public function fillable(): bool
    {
        return true;
    }

    public function title(): string
    {
        return __('Не пройден');
    }

    public function initial(): bool
    {
        return true;
    }
}
