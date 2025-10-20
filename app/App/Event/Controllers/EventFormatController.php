<?php

namespace App\Event\Controllers;

use Domain\Event\Actions\GetEventFormatsAction;
use Domain\Event\Models\EventFormat;
use Illuminate\Http\Request;
use Support\Controller;

class EventFormatController extends Controller
{
    public function index(Request $request, GetEventFormatsAction $action)
    {
        if($request->wantsJson()) {
            return $action->run($request->q, true);
        }

        abort(403);
    }

    public function show(EventFormat $format)
    {
        return $format;
    }
}
