<?php

namespace Domain\Consultation\Notifications;

use Domain\Consultation\Models\Consultation;
use Illuminate\Notifications\Messages\MailMessage;
use Support\Notification;

class StudentInviteConsultationNotification extends Notification
{
    protected Consultation $consultation;

    public function __construct(Consultation $consultation)
    {
        $this->consultation = $consultation;
    }

    public function toArray($notifiable)
    {
        return [
            'title' => "Вы записаны на консультацию {$this->consultation->formattedStartAt}"
        ];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject(__("Запись на консультацию"))
            ->markdown('mail.consultation.invite', ['consultation' => $this->consultation]);
    }

    public function toIqSms($notifiable)
    {
        return [
            'to' => $notifiable->phone,
            'message' => "Вы записаны на консультацию {$this->consultation->formattedStartAt}",
        ];
    }
}
