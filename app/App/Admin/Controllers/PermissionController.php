<?php

namespace App\Admin\Controllers;

use App\Admin\Actions\GetPermissionsAction;
use Illuminate\Http\Request;
use Support\Controller;

class PermissionController extends Controller
{
    public function index(Request $request, GetPermissionsAction $action)
    {
        if ($request->expectsJson()) {
            return $action->run($request->q, true);
        }

        abort(403);
    }

}
