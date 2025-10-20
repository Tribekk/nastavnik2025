<?php

namespace Domain\Event\States\EventInvite;

class PendingEventInviteState extends EventInviteState
{
    public static string $name = 'pending';

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
