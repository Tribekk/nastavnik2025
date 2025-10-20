<?php

namespace Domain\Event\States\Event;

class CarriedOutEventState extends EventState
{
    public static string $name = 'carried-out';

    public function code(): string
    {
        return self::$name;
    }

    public function color(): string
    {
        return 'text-success';
    }

    public function title(): string
    {
        return __('Проведена');
    }

    public function initial(): bool
    {
        return false;
    }
}
