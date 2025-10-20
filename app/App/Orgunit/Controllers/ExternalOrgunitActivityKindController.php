<?php

namespace App\Orgunit\Controllers;

use Domain\Orgunit\Actions\GetActivityKindsAction;
use Domain\Orgunit\Models\ExternalOrgunitActivityKind;
use Domain\UserProfile\Models\UserProfile;
use Illuminate\Http\Request;
use Support\Controller;

class ExternalOrgunitActivityKindController extends Controller
{
    public function index(Request $request, GetActivityKindsAction $action)
    {
        if($request->wantsJson()) {
            return $action->run($request->q, true);
        }


        abort(403);
    }

    public function show(string $activityKind)
    {
        $result = [];
        $items = explode(',', $activityKind);

        foreach($items as $item) {

//            if($row = ExternalOrgunitActivityKind::find(intval($item))) {
            if($row = UserProfile::find(intval($item))) {
                $result[] = ['id' => $row->id, 'title' => $row->title];
            }
        }

        return $result;
    }
}
