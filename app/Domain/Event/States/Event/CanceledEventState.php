<?php


namespace Domain\Event\States\Event;


class CanceledEventState extends EventState
{
    public static string $name = 'canceled';

    public function code(): string
    {
        return self::$name;
    }

    public function color(): string
    {
        return 'font-alla';
    }

    public function title(): string
    {
        return __('Отменена');
    }

    public function initial(): bool
    {
        return false;
    }
}
