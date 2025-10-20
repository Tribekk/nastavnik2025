<?php

namespace Domain\Quiz\States\Quiz;

use Spatie\ModelStates\State;

abstract class QuizState extends State
{
    abstract public function code(): string;

    abstract public function color(): string;

    abstract public function fillable(): bool;

    abstract public function initial(): bool;

    abstract public function title(): string;
}
