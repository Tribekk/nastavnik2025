<?php

namespace Domain\Profession\Controllers;

use Domain\Profession\Actions\GetActivityObjectsAction;
use Domain\Quiz\Models\ActivityObject;
use Illuminate\Http\Request;

class ActivityObjectController
{
    public function index(Request $request, GetActivityObjectsAction $action)
    {
        if(!$request->wantsJson()) abort(403);

        return $action->run($request->q, true);
    }

    public function show(ActivityObject $activityObject)
    {
        return $activityObject;
    }
}
