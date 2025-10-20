<?php

namespace Support;

use Domain\User\Models\User;
use Illuminate\Bus\Queueable;
use \Illuminate\Notifications\Notification as BaseNotification;
use Illuminate\Support\Facades\Log;

class Notification extends BaseNotification
{
    use Queueable;

    protected bool $iqSmsOnlyProd = true;

    public function via($notifiable)
    {
        $result = ['database'];
        if($notifiable instanceof User) {
            if(!$this->iqSmsOnlyProd || env('APP_ENV', 'local') == 'production') {
                $result[] = 'iqSMS';
            }

            if($notifiable->email) $result[] = 'mail';
        }

        return $result;
    }
}
