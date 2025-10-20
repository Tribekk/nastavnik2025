<?php

namespace App\Admin\Controllers;

use App\Admin\Actions\GetTypesEducationalOrganizationAction;
use Domain\Admin\Models\TypeEducationalOrganization;
use Illuminate\Http\Request;
use Support\Controller;

class TypeEducationalOrganizationController extends Controller
{
    public function index(Request $request, GetTypesEducationalOrganizationAction $action)
    {
        if ($request->expectsJson()) {
            return $action->run($request->q, true);
        }

        return abort(403);
    }

    public function show(Request $request, TypeEducationalOrganization $type)
    {
        if ($request->expectsJson()) {
            return $type;
        }

        return abort(403);
    }
}
