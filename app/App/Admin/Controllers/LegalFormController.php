<?php

namespace App\Admin\Controllers;

use App\Admin\Requests\StoreLegalFormRequest;
use App\Admin\Requests\UpdateLegalFormRequest;
use Domain\Orgunit\Actions\CreateLegalFormAction;
use Domain\Orgunit\Actions\GetLegalFormsAction;
use Domain\Orgunit\Actions\UpdateLegalFormAction;
use Domain\Orgunit\Models\LegalForm;
use Illuminate\Http\Request;
use Support\Controller;

class LegalFormController extends Controller
{
    public function index(Request $request, GetLegalFormsAction $action)
    {
        if($request->wantsJson()) {
            return $action->run($request->q, true);
        }

        return view('admin.orgunits.legal_forms.index')
            ->withLegalForms($action->run($request->q, false, $request->input()));
    }

    public function create()
    {
        return view('admin.orgunits.legal_forms.create');
    }

    public function store(StoreLegalFormRequest $request, CreateLegalFormAction $action)
    {
        $action->run($request->input());

        return redirect(route('admin.orgunits.legal_forms.view'))
            ->with('status', 'Организационно-правовая форма добавлена');
    }

    public function edit(LegalForm $legalForm)
    {
        return view('admin.orgunits.legal_forms.edit')
            ->withLegalForm($legalForm);
    }

    public function update(UpdateLegalFormRequest $request, LegalForm $legalForm, UpdateLegalFormAction $action)
    {
        $action->run($legalForm, $request->input());

        return redirect(route('admin.orgunits.legal_forms.view'))
            ->with('status', 'Данные обновлены');
    }

    public function destroy(LegalForm $legalForm)
    {
        try {
            $legalForm->delete();
        } catch (\Exception $exception) {
            return redirect(route('admin.orgunits.legal_forms.edit', ['legalForm' => $legalForm]))
                ->withErrors(['destroy' => __('У данной формы есть связь с организацией')]);
        }

        return redirect(route('admin.orgunits.legal_forms.view'))
            ->with('status', 'Организационно-правовая форма удалена');
    }

    public function show(Request $request, LegalForm $legalForm)
    {
        return $legalForm;
    }
}
