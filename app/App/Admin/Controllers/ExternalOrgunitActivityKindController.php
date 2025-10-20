<?php

namespace App\Admin\Controllers;

use App\Admin\Requests\StoreExternalOrgunitActivityKindRequest;
use App\Admin\Requests\UpdateExternalOrgunitActivityKindRequest;
use Domain\Orgunit\Actions\CreateActivityKindAction;
use Domain\Orgunit\Actions\GetActivityKindsAction;
use Domain\Orgunit\Actions\UpdateActivityKindAction;
use Domain\Orgunit\Models\ExternalOrgunitActivityKind;
use Domain\User\Models\User;
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

        return view('admin.orgunits.activity_kinds.index')
            ->withActivityKinds($action->run($request->q, false, $request->input()));
    }

    public function create()
    {
        return view('admin.orgunits.activity_kinds.create');
    }

    public function store(StoreExternalOrgunitActivityKindRequest $request, CreateActivityKindAction $action)
    {
        $action->run($request->input());

        return redirect(route('admin.orgunits.activity_kinds.view'))
            ->with('status', 'Направление деятельности добавлено');
    }

    public function edit(ExternalOrgunitActivityKind $activityKind)
    {
        return view('admin.orgunits.activity_kinds.edit')
            ->withActivityKind($activityKind);
    }

    public function update(UpdateExternalOrgunitActivityKindRequest $request, ExternalOrgunitActivityKind $activityKind, UpdateActivityKindAction $action)
    {
        $action->run($activityKind, $request->input());

        return redirect(route('admin.orgunits.activity_kinds.view'))
            ->with('status', 'Данные обновлены');
    }

    public function destroy(ExternalOrgunitActivityKind $activityKind)
    {
        try {
            $activityKind->delete();
        } catch (\Exception $exception) {
            return redirect(route('admin.orgunits.activity_kinds.edit', ['activityKind' => $activityKind]))
                ->withErrors(['destroy' => __('У данного направления деятельности есть связь с организацией')]);
        }

        return redirect(route('admin.orgunits.activity_kinds.view'))
            ->with('status', 'Направление деятельности удалено');
    }

    public function show(string $activityKind)
    {
        $result = [];
        $items = explode(',', $activityKind);

        foreach($items as $item) {
            if($row = UserProfile::find(intval($item))) {
                $result[] = ['id' => $row->id, 'title' => $row->title];
            }
        }

        return $result;
    }
}
