<?php

namespace Domain\Consultation\Notifications;

use Domain\Consultation\Models\Consultation;
use Illuminate\Notifications\Messages\MailMessage;
use Support\Notification;

class RemoveConsultationNotification extends Notification
{
    protected Consultation $consultation;

    public function __construct(Consultation $consultation)
    {
        $this->consultation = $consultation;
    }

    public function toArray($notifiable)
    {
        return [
            'title' => "Консультация ({$this->consultation->formattedStartAt}) была удалена"
        ];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject(__("Консультация удалена"))
            ->markdown('mail.consultation.delete', ['consultation' => $this->consultation]);
    }

    public function toIqSms($notifiable)
    {
        return [
            'to' => $notifiable->phone,
            'message' => "Консультация ({$this->consultation->formattedStartAt}) была удалена",
        ];
    }
}
