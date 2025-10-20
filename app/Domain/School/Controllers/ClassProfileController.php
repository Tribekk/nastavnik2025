<?php

namespace Domain\School\Controllers;

use App\Admin\Actions\GetSchoolClassesAction;
use Domain\Admin\Models\ClassProfile;
use Domain\Admin\Models\School;
use Domain\Admin\Models\SchoolClass;
use Domain\School\Actions\GetClassProfilesAction;
use Domain\School\Middleware\HasTeacherRole;
use Domain\School\Wrappers\SchoolStudentQuizWrapper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Support\Controller;

class ClassProfileController extends Controller
{
    public function index(Request $request, GetClassProfilesAction $action)
    {
        if($request->wantsJson()) {
            return $action->run($request->q, true);
        }

        return $action->run($request->q);
    }

    public function show(ClassProfile $profile)
    {
        return $profile;
    }
}
