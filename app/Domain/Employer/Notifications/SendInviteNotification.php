<?php

namespace Domain\Employer\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Support\Notification;

class SendInviteNotification extends Notification
{
    protected string $title;
    protected string $message;
    protected string $url;

    public function __construct(string $title, string $message, string $url)
    {
        $this->title = $title;
        $this->message = $message;
        $this->url = $url;
    }

    public function toArray($notifiable)
    {
        return [
            'title' => $this->message,
            'link' => $this->url,
        ];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject(__($this->title))
            ->markdown('mail.employer.send_invite', ['message' => $this->message, 'url' => $this->url]);
    }

    public function toIqSms($notifiable)
    {
        return [
            'to' => $notifiable->phone,
            'message' => "$this->message\n$this->url",
        ];
    }

}
