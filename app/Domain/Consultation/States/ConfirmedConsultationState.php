<?php


namespace Domain\Consultation\States;


class ConfirmedConsultationState extends ConsultationState
{
    public static string $name = 'confirmed';

    public function code(): string
    {
        return self::$name;
    }

    public function color(): string
    {
        return 'font-blue';
    }

    public function title(): string
    {
        return __('Подтверждена');
    }

    public function initial(): bool
    {
        return false;
    }
}
