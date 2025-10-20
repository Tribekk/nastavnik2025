<?php


namespace Support\IqSMS\Channels;


use Illuminate\Notifications\Notification;
use Support\IqSMS\IqSMS;

class IqSmsChannel
{
    protected IqSMS $iqSms;

    public function __construct(IqSMS $iqSms = null)
    {
        $this->iqSms = $iqSms ?? new IqSMS();
    }

    public function send($notifiable, Notification $notification)
    {
        $params = $notification->toIqSms($notifiable);

        if (!is_array($params)) {
            throw new \Exception('toIqSms должен возвращать массив параметров для отправки сообщения');
        }

        if(!isset($params['to']) || !isset($params['message'])) {
            throw new \Exception('toIqSms должен содержать параметры - to и message');
        }

        if(is_array($params['to'])) {
            foreach ($params['to'] as $to) {
                $this->iqSms->send($to, $params['message']);
            }
        } else {
            $this->iqSms->send($params['to'], $params['message']);
        }
    }
}
