<?php

namespace App\Orgunit\Controllers;

use App\Admin\Requests\StoreExternalOrgunitRequest;
use App\Admin\Requests\UpdateExternalOrgunitRequest;
use App\Orgunit\Requests\UpdateExternalOrgunitDescriptionRequest;
use Domain\Orgunit\Actions\CreateExternalOrgunitAction;
use Domain\Orgunit\Actions\DeleteExternalOrgunitLogoAction;
use Domain\Orgunit\Actions\GetChildrenOrgunitsAction;
use Domain\Orgunit\Actions\GetOrgunitsAction;
use Domain\Orgunit\Actions\UpdateExternalOrgunitAction;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Support\Controller;

use App\project;

class Project2Controller extends Controller
{
    public function index(Request $request, GetOrgunitsAction $action, GetChildrenOrgunitsAction $getChildrenOrgunitsAction)
    {
        if($request->wantsJson()) {
            return $action->run($request->q, true);
        }

        if(!Auth::user()->isEmployer) abort(403);
        if(Auth::user()->orgunit) {
            return view('orgunits.index')
                ->withOrgunits($getChildrenOrgunitsAction->run(Auth::user()->orgunit, $request->q, false, $request->all()));
        }

        return view('orgunits.errors.undefined_orgunit');
    }

    public function children(Request $request, ExternalOrgunit $orgunit, GetChildrenOrgunitsAction $action)
    {
        if($request->wantsJson()) {
            return $action->run($orgunit, $request->q, true);
        }

        abort(403);
    }

    public function show(ExternalOrgunit $orgunit)
    {
        return $orgunit;
    }

    public function childCreate(ExternalOrgunit $orgunit)
    {
        return view('orgunits.child_create')
            ->withParentId($orgunit->id);
    }


    public function store(StoreExternalOrgunitRequest $request, CreateExternalOrgunitAction $action)
    {
        $action->run($request->all());

        return redirect(route('orgunits.view'))
            ->with('status', 'Организация добавлена');
    }

    public function edit(ExternalOrgunit $orgunit)
    {
        return view('orgunits.edit')
            ->withOrgunit($orgunit);
    }

    public function update(UpdateExternalOrgunitRequest $request, ExternalOrgunit $orgunit, UpdateExternalOrgunitAction $action)
    {
        $action->run($orgunit, $request->all());

        return redirect(route('orgunits.view'))
            ->with('status', 'Данные обновлены');
    }

    public function destroy(ExternalOrgunit $orgunit)
    {
        if($orgunit->hasRelations) {
            return redirect(route('orgunits.edit', ['orgunit' => $orgunit]))
                ->withErrors(['destroy' => __('У данной организации есть связь с организацией или пользователем')]);
        }

        $orgunit->delete();

        return redirect(route('orgunits.view'))
            ->with('status', 'Организация удалена');
    }

    public function logoDestroy(ExternalOrgunit $orgunit, DeleteExternalOrgunitLogoAction $action)
    {
        $action->run($orgunit);
        return response('Логотип организации успешно удален!', 201);
    }

    public function description(ExternalOrgunit $orgunit)
    {
        return view('orgunits.description')
            ->withOrgunit($orgunit);
    }

    public function editDescription(ExternalOrgunit $orgunit)
    {
        return view('orgunits.edit_description')
            ->withOrgunit($orgunit);
    }

    public function updateDescription(UpdateExternalOrgunitDescriptionRequest $request, ExternalOrgunit $orgunit)
    {
        $orgunit->update([
            'career_program' => $request->input('career_program'),
            'about_orgunit' => $request->input('about_orgunit'),
            'contacts' => $request->input('contacts')
        ]);

        return redirect(route('orgunits.description.edit', $orgunit))
            ->with('status', 'Данные обновлены');
    }
}
