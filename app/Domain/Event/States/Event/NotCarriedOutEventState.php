<?php

namespace Domain\Event\States\Event;

class NotCarriedOutEventState extends EventState
{
    public static string $name = 'not-carried-out';

    public function code(): string
    {
        return self::$name;
    }

    public function color(): string
    {
        return 'text-primary';
    }

    public function title(): string
    {
        return __('Не проведена');
    }

    public function initial(): bool
    {
        return false;
    }
}
