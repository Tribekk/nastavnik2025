<?php

namespace App\Event\Controllers;

use App\Event\Requests\StoreEventAudienceRequest;
use App\Event\Requests\UpdateEventAudienceRequest;
use Domain\Event\Actions\CreateEventAudienceAction;
use Domain\Event\Actions\GetEventAudienceAction;
use Domain\Event\Actions\UpdateEventAudienceAction;
use Domain\Event\Models\EventAudience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Support\Controller;

class EventAudienceController extends Controller
{
    public function index(Request $request, GetEventAudienceAction $action)
    {
        if($request->wantsJson()) {
            return $action->run($request->q, true);
        }

        return view('events.audience.index')
            ->withAudience($action->run($request->q));
    }

    public function show(string $audience)
    {
        $result = [];
        $items = explode(',', $audience);

        foreach($items as $item) {
            if($row = EventAudience::find(intval($item))) {
                $result[] = ['id' => $row->id, 'title' => $row->title];
            }
        }

        return $result;
    }

    public function create()
    {
        return view('events.audience.create');
    }

    public function store(StoreEventAudienceRequest $request, CreateEventAudienceAction $action)
    {
        $action->run($request->validated());
        return redirect()->to(route('employer.events.audience.view'))
            ->with('status', 'Аудитория добавлена');
    }

    public function edit(EventAudience $audience)
    {
        return view('events.audience.edit')
            ->withAudience($audience);
    }

    public function update(UpdateEventAudienceRequest $request, EventAudience $audience, UpdateEventAudienceAction $action)
    {
        $action->run($audience, $request->validated());
        return redirect()->to(route('employer.events.audience.view'))
            ->with('status', 'Данные обновлены');
    }

    public function destroy(EventAudience $audience)
    {
        try {
            $audience->delete();

            return redirect()->to(route('employer.events.audience.view'))
                ->with('status', 'Аудитория удалена');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back()->withInput()
                ->withErrors(['error' => 'Не удалось удалить аудиторию из-за того что она уже используется.']);
        }
    }
}
