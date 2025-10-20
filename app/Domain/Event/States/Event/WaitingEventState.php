<?php

namespace Domain\Event\States\Event;

class WaitingEventState extends EventState
{
    public static string $name = 'waiting';

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
        return __('Ожидается');
    }

    public function initial(): bool
    {
        return true;
    }
}
