<?php

namespace App\Orgunit\Controllers;

use Domain\Orgunit\Actions\GetLegalFormsAction;
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

        abort(403);
    }

    public function show(LegalForm $legalForm)
    {
        return $legalForm;
    }
}
