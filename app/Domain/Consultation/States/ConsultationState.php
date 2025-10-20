<?php

namespace Domain\Consultation\States;

use Spatie\ModelStates\State;

abstract class ConsultationState extends State
{
    public static string $name;

    abstract public function code(): string;

    abstract public function color(): string;

    abstract public function initial(): bool;

    abstract public function title(): string;
}
