<?php

namespace Domain\Employer\Controllers;

use Domain\Employer\Notifications\SendNotifyNotification;
use Domain\Employer\Requests\SendNotifyRequest;
use Domain\User\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;
use Support\Controller;

class EmployerSendNotifyController extends Controller
{

    public function send(SendNotifyRequest $request, User $user)
    {
        try {
            $user->notify(new SendNotifyNotification($request->input('title'), $request->input('message'), $request->input('url')));
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
        }

        return response()->json(['message' => 'Сообщение отправлено'], 201);
    }

    public function sendToUsers(SendNotifyRequest $request)
    {
        set_time_limit(0);
        User::whereIn('id', $request->input('users', []))->chunk(50, function ($users) use ($request) {
            Notification::send($users, new SendNotifyNotification($request->input('title'), $request->input('message'), $request->input('url')));
            sleep(1);
        });

        return response()->json(['message' => 'Сообщения отправлены'], 201);
    }

}
