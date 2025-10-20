<?php

namespace Domain\Event\States\EventInvite;

class AcceptedEventInviteState extends EventInviteState
{
    public static string $name = 'accepted';

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
        return __('Подтверждено');
    }

    public function initial(): bool
    {
        return false;
    }
}
