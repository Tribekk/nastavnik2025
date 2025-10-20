<?php

namespace App\Event\Controllers;

use App\Event\Requests\StoreEventDirectionRequest;
use App\Event\Requests\UpdateEventDirectionRequest;
use Domain\Event\Actions\CreateEventDirectionAction;
use Domain\Event\Actions\GetEventDirectionsAction;
use Domain\Event\Actions\UpdateEventDirectionAction;
use Domain\Event\Models\EventAudience;
use Domain\Event\Models\EventDirection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Support\Controller;

class EventDirectionController extends Controller
{
    public function index(Request $request, GetEventDirectionsAction $action)
    {
        if($request->wantsJson()) {
            return $action->run($request->q, true);
        }

        if(!Auth::user()->isEmployer) abort(403);

        return view('events.directions.index')
            ->withDirections($action->run($request->q));
    }

    public function show(string $direction)
    {
        $result = [];
        $items = explode(',', $direction);

        foreach($items as $item) {
            if($row = EventDirection::find(intval($item))) {
                $result[] = ['id' => $row->id, 'title' => $row->title];
            }
        }

        return $result;
    }

    public function create()
    {
        return view('events.directions.create');
    }

    public function store(StoreEventDirectionRequest $request, CreateEventDirectionAction $action)
    {
        $action->run($request->validated());
        return redirect()->to(route('employer.events.directions.view'))
            ->with('status', 'Направление добавлено');
    }

    public function edit(EventDirection $direction)
    {
        return view('events.directions.edit')
            ->withDirection($direction);
    }

    public function update(UpdateEventDirectionRequest $request, EventDirection $direction, UpdateEventDirectionAction $action)
    {
        $action->run($direction, $request->validated());
        return redirect()->to(route('employer.events.directions.view'))
            ->with('status', 'Данные обновлены');
    }

    public function destroy(EventDirection $direction)
    {
        try {
            $direction->delete();

            return redirect()->to(route('employer.events.directions.view'))
                ->with('status', 'Направление удалено');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back()->withInput()
                ->withErrors(['error' => 'Не удалось удалить направление из-за того что оно уже используется.']);
        }
    }
}
