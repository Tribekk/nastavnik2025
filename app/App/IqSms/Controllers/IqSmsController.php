<?php

namespace App\IqSms\Controllers;

use App\Admin\Middleware\AdminMiddleware;
use App\IqSms\Requests\SendIqSmsRequest;
use Illuminate\Support\Facades\Log;
use Support\Controller;
use Support\IqSMS\ErrorCode as IqSmsErrorCode;
use Support\IqSMS\IqSMS;

class IqSmsController extends Controller
{
    public function __construct()
    {
        $this->middleware(AdminMiddleware::class);
    }

    public function send(SendIqSmsRequest $request, IqSMS $iqSms)
    {
        if(env('APP_ENV', 'local') == 'production') {
            try {
                $iqSms->send($request->phone, $request->message);
            } catch (\Exception $exception) {
                if($exception instanceof \InvalidArgumentException) {
                    if($exception->getCode() === IqSmsErrorCode::INVALID_PHONE) {
                        return response()->json(['message' => 'Пожалуйста, укажите корректный «телефон».'], 422);
                    }

                    if($exception->getCode() === IqSmsErrorCode::NOT_ENOUGH_CREDITS) {
                        return response()->json(['message' => 'Недостаточно средств для отправки сообщения'], 422);
                    }
                }

                Log::error($exception->getMessage());
                return response()->json(['message' => 'Неизвестная ошибка. Отправка сообщений временно недоступна'], 422);
            }
        } else {
            Log::info("Вызвана функция IqSmsController->send();. Телефон: {$request->phone}, Сообщение: {$request->message}");
        }

        return response()->json(['message' => 'Сообщение успешно доставлено!'], 201);
    }
}
