<?php


namespace Domain\Consultation\States;


class PendingConsultationState extends ConsultationState
{
    public static string $name = 'pending';

    public function code(): string
    {
        return self::$name;
    }

    public function color(): string
    {
        return 'text-warning';
    }

    public function title(): string
    {
        return __('Проводится');
    }

    public function initial(): bool
    {
        return false;
    }
}
