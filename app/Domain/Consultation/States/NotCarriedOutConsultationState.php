<?php


namespace Domain\Consultation\States;


class NotCarriedOutConsultationState extends ConsultationState
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
