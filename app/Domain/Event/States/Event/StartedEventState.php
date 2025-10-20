<?php

namespace Domain\Event\States\Event;

class StartedEventState extends EventState
{
    public static string $name = 'started';

    public function code(): string
    {
        return self::$name;
    }

    public function color(): string
    {
        return 'font-orange';
    }

    public function title(): string
    {
        return __('Проходит');
    }

    public function initial(): bool
    {
        return false;
    }
}
