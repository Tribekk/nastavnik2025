<?php

namespace App\Event\Controllers;

use Domain\Event\Actions\AcceptEventInviteAction;
use Domain\Event\Actions\CancelEventInviteAction;
use Domain\Event\Actions\GetEventFilterFormatsAction;
use Domain\Event\Actions\GetEventFilterStatesAction;
use Domain\Event\Actions\GetEventInviteFilterStatesAction;
use Domain\Event\Actions\GetEventInvitesAction;
use Domain\Event\Models\EventInvite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Support\Controller;

class UserEventInviteController extends Controller
{
    public function index(Request $request, GetEventInvitesAction $action, GetEventFilterStatesAction $getEventFilterEventStatesAction, GetEventFilterFormatsAction $getEventFilterFormatsAction, GetEventInviteFilterStatesAction $getEventInviteFilterStatesAction)
    {
        if($request->wantsJson()) {
            return $action->run(Auth::user(), $request->q, true);
        }

        return view('events.user.invites.index')
            ->withInvites($action->run(Auth::user(), $request->q, false, $request->input()))
            ->withEventStates($getEventFilterEventStatesAction->run())
            ->withStates($getEventInviteFilterStatesAction->run())
            ->withFormats($getEventFilterFormatsAction->run());
    }

    public function show(EventInvite $eventInvite)
    {
        return view('events.user.invites.show')
            ->withEventInvite($eventInvite);
    }

    public function destroy(EventInvite $eventInvite)
    {
        $eventInvite->delete();
        return redirect()->to(route('events.invites.view'))
            ->with('status', 'Приглашение удалено');
    }

    public function accept(EventInvite $eventInvite, AcceptEventInviteAction $action)
    {
        $action->run($eventInvite);

        return redirect()->to(route('events.invites.view'))
            ->with('status', 'Приглашение подтверждено');
    }

    public function cancel(EventInvite $eventInvite, CancelEventInviteAction $action)
    {
        $action->run($eventInvite);

        return redirect()->to(route('events.invites.view'))
            ->with('status', 'Приглашение отклонено');
    }
}
