<?php

namespace Domain\Employer\Controllers;

use Domain\Employer\Notifications\SendInviteNotification;
use Domain\Employer\Requests\SendInviteEventRequest;
use Domain\Employer\Requests\SendInviteRequest;
use Domain\Event\Models\EventInvite;
use Domain\User\Actions\AddDepthTestsAction;
use Domain\User\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Support\Controller;

class EmployerSendInviteEventController extends Controller
{
    public function send(SendInviteEventRequest $request, User $user)
    {
        if(!EventInvite::where('user_id', $user->id)->where('event_id', $request->event_id)->first()) {
            $this->sendInviteUser($request, $user);
        } else {
            return response()->json(['message' => 'Пользователь уже приглашен на это мероприятие'], 422);
        }

        return response()->json(['message' => 'Приглашение отправлено'], 201);
    }

    public function sendToUsers(SendInviteEventRequest $request)
    {
        set_time_limit(0);
        User::whereIn('id', $request->input('users', []))->chunk(50, function($users) use ($request) {
            foreach ($users as $user) {
                $this->sendInviteUser($request, $user);
                sleep(1);
            }
        });

        return response()->json(['message' => 'Приглашения отправлены'], 201);
    }

    public function sendInviteUser(SendInviteEventRequest $request, User $user)
    {
        try {
            if(!EventInvite::where('user_id', $user->id)->where('event_id', $request->event_id)->first()) {
                $event_invite = EventInvite::create([
                    'uuid' => Str::uuid(),
                    'user_id' => $user->id,
                    'event_id' => $request->event_id,
                ]);

//                $link_event = '<a href="/events/'.$request->event_id.'">Ссылка на мероприятие</a>. ';
                $user->notify(new SendInviteNotification('Приглашение на мероприятие', $request->message, route('events.invites.view').'/'.$event_invite->id));
            }
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
        }
    }

}
