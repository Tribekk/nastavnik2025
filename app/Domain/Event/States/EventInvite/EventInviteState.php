<?php

namespace Domain\Event\States\EventInvite;

use Spatie\ModelStates\State;

abstract class EventInviteState extends State
{
    public static string $name;

    abstract public function code(): string;

    abstract public function color(): string;

    abstract public function initial(): bool;

    abstract public function title(): string;
}
