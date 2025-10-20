<?php


namespace Domain\Consultation\States;


class NotVerifiedConsultationState extends ConsultationState
{
    public static string $name = 'not-verified';

    public function code(): string
    {
        return self::$name;
    }

    public function color(): string
    {
        return 'text-danger';
    }

    public function title(): string
    {
        return __('На согласовании');
    }

    public function initial(): bool
    {
        return true;
    }
}
