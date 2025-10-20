<?php

namespace Domain\Event\States\EventInvite;

class CanceledEventInviteState extends EventInviteState
{
    public static string $name = 'canceled';

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
        return __('Отменено');
    }

    public function initial(): bool
    {
        return false;
    }
}
