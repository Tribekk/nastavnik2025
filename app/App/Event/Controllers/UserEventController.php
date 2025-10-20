<?php

namespace App\Event\Controllers;

use Domain\Event\Actions\GetEventFilterFormatsAction;
use Domain\Event\Actions\GetEventFilterStatesAction;
use Domain\Event\Actions\GetUserEventsAction;
use Domain\Event\Models\EventParticipant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Support\Controller;

class UserEventController extends Controller
{
    public function index(Request $request, GetUserEventsAction $action, GetEventFilterStatesAction $getEventFilterStatesAction, GetEventFilterFormatsAction $getEventFilterFormatsAction)
    {

        if($request->wantsJson()) {
            return $action->run(Auth::user(), $request->q, true);
        }

        return view('events.user.index')
            ->withEvents($action->run(Auth::user(), $request->q, false, $request->input()))
            ->withStates($getEventFilterStatesAction->run())
            ->withFormats($getEventFilterFormatsAction->run());
    }

    public function show(EventParticipant $event)
    {
        return view('events.user.show')
            ->withEvent($event);
    }
}
