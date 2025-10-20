<?php

namespace App\Event\Controllers;

use App\Event\Requests\StoreEventRequest;
use App\Event\Requests\UpdateEventRequest;
use Domain\Event\Actions\CreateEventAction;
use Domain\Event\Actions\DeleteEventAttachedFilesAction;
use Domain\Event\Actions\GetEventFilterFormatsAction;
use Domain\Event\Actions\GetEventFilterStatesAction;
use Domain\Event\Actions\GetEventParticipantsAction;
use Domain\Event\Actions\GetEventsAction;
use Domain\Event\Actions\UpdateEventAction;
use Domain\Event\Actions\UpdateEventParticipantAction;
use Domain\Event\Models\Event;
use Domain\Event\Models\EventParticipant;
use Domain\Event\States\Event\EventState;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Support\Controller;

class EventController extends Controller
{
    public function index(Request $request, GetEventsAction $action, GetEventFilterStatesAction $getEventFilterStatesAction, GetEventFilterFormatsAction $getEventFilterFormatsAction)
    {
        if($request->wantsJson()) {
            return $action->run($request->q, true, [], Auth::user()->orgunit_id);
        }

        return view('events.index')
            ->withEvents($action->run($request->q, false, $request->input(), Auth::user()->orgunit_id))
            ->withStates($getEventFilterStatesAction->run())
            ->withFormats($getEventFilterFormatsAction->run());
    }

    public function create()
    {
        return view('events.create');
    }


    public function store(StoreEventRequest $request, CreateEventAction $action)
    {
        $action->run($request->all());

        return redirect(route('employer.events.view'))
            ->with('status', 'Мероприятие добавлено');
    }

    public function edit(Event $event)
    {
        $stateNames = $event->state->transitionableStates();
        $states = [];

        /** @var EventState $stateNamespace */
        foreach ($stateNames as $stateName) {
            $stateClass = EventState::resolveStateClass($stateName);
            $state = new $stateClass($event);
            $states[] = ['value' => $state->code(), 'title' => $state->title()];
        }

        return view('events.edit')
            ->withEvent($event)
            ->withStates($states);
    }

    public function update(UpdateEventRequest $request, Event $event, UpdateEventAction $action)
    {
        $action->run($event, $request->all(), $request->file('attached_files'));

        return redirect(route('employer.events.view'))
            ->with('status', 'Данные обновлены');
    }

    public function destroy(Event $event, DeleteEventAttachedFilesAction $action)
    {
        try {
           DB::transaction(function () use ($event, $action) {
               $event->audience()->delete();
               $event->directions()->delete();
               $event->invites()->withTrashed()->forceDelete();
               $action->run($event);
               $event->delete();
           });
        } catch (\Exception $exception) {
            return back()->withInput()
                ->withErrors(['error' => 'У данного мероприятия есть участники и это мероприятие нельзя удалить']);
        }

        return redirect(route('employer.events.view'))
            ->with('status', 'Мероприятие удалено');
    }

    public function participants(Request $request, Event $event, GetEventParticipantsAction $action)
    {
        return view('events.participants')
            ->withParticipants($action->run($event, $request->q, false, $request->input()))
            ->withEvent($event);
    }

    public function participantsUpdateState(Request $request, EventParticipant $participant, UpdateEventParticipantAction $action)
    {
        $action->run($participant, $request->input());
        return back()->withInput()
            ->with('status', 'Участник '.$participant->user->fullName.' обновлен');
    }
}
