<?php

namespace Domain\Consultation\Notifications;

use Domain\Consultation\Models\Consultation;
use Illuminate\Notifications\Messages\MailMessage;
use Support\Notification;

class ConsultationConfirmedNotification extends Notification
{
    protected Consultation $consultation;

    public function __construct(Consultation $consultation)
    {
        $this->consultation = $consultation;
    }

    public function toArray($notifiable)
    {
        return [
            'title' => "Консультация ({$this->consultation->formattedStartAt}) была подтверждена"
        ];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject(__("Подтверждение консультации"))
            ->markdown('mail.consultation.confirmed', ['consultation' => $this->consultation]);
    }

    public function toIqSms($notifiable)
    {
        return [
            'to' => $notifiable->phone,
            'message' => "Консультация ({$this->consultation->formattedStartAt}) была подтверждена",
        ];
    }
}
