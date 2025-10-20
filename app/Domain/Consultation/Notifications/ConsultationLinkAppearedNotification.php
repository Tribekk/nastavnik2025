<?php

namespace Domain\Consultation\Notifications;

use Domain\Consultation\Models\Consultation;
use Illuminate\Notifications\Messages\MailMessage;
use Support\Notification;

class ConsultationLinkAppearedNotification extends Notification
{
    protected Consultation $consultation;

    public function __construct(Consultation $consultation)
    {
        $this->consultation = $consultation;
    }

    public function toArray($notifiable)
    {
        return [
            'title' => "Добавлена ссылка на онлайн-консультацию"
        ];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject(__("Добавлена ссылка на онлайн-консультацию"))
            ->markdown('mail.consultation.appeared-link', ['consultation' => $this->consultation]);
    }

    public function toIqSms($notifiable)
    {
        return [
            'to' => $notifiable->phone,
            'message' => "Добавлена ссылка на онлайн-консультацию",
        ];
    }
}
