<?php

namespace Domain\Employer\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Support\Notification;

class SendNotifyNotification extends Notification
{
    protected string $title;
    protected string $message;
    protected ?string $url;

    public function __construct(string $title, string $message, ?string $url = null)
    {
        $this->title = $title;
        $this->message = $message;
        $this->url = $url;
    }

    public function toArray($notifiable)
    {
        $data = [
            'title' => $this->message,
        ];

        if($this->url) {
            $data['url'] = $this->url;
        }

        return $data;
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject(__($this->title))
            ->markdown('mail.employer.send_notify', ['message' => $this->message, 'url' => $this->url]);
    }

    public function toIqSms($notifiable)
    {
        return [
            'to' => $notifiable->phone,
            'message' => $this->url ? "$this->message\n$this->url" : "$this->message",
        ];
    }
}
