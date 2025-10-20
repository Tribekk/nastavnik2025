<?php

namespace Domain\Profession\Controllers;

use Domain\Profession\Actions\GetActivityKindsAction;
use Domain\Quiz\Models\ActivityKind;
use Illuminate\Http\Request;

class ActivityKindController
{
    public function index(Request $request, GetActivityKindsAction $action)
    {
        if(!$request->wantsJson()) abort(403);

        return $action->run($request->q, true);
    }

    public function show(ActivityKind $activityKind)
    {
        return $activityKind;
    }
}
