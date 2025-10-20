<?php


namespace Domain\Quiz\States\Quiz;


class PendingQuizState extends QuizState
{
    public function code(): string
    {
        return 'pending';
    }

    public function color(): string
    {
        return 'info';
    }

    public function fillable(): bool
    {
        return true;
    }

    public function title(): string
    {
        return __('В процессе прохождения');
    }

    public function initial(): bool
    {
        return false;
    }
}
