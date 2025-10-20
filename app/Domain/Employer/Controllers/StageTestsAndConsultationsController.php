<?php

namespace Domain\Employer\Controllers;

use Domain\Employer\Actions\GetClassesStageTestsAndConsultationsAction;
use Domain\Employer\Actions\GetSchoolsStageTestsAndConsultationsAction;
use Domain\Employer\Actions\GetSelectedItemsSelect2ByStringValuesAction;
use Illuminate\Http\Request;
use Support\Controller;

class StageTestsAndConsultationsController extends Controller
{
    public function schools(Request $request, GetSchoolsStageTestsAndConsultationsAction $action)
    {
        return $action->run($request->q);
    }

    public function school(string $school, GetSelectedItemsSelect2ByStringValuesAction $action)
    {
        $result = $action->run('school', $school);
        if(count($result)) return $result;
        abort(404);
    }

    public function classes(Request $request, GetClassesStageTestsAndConsultationsAction $action)
    {
        return $action->run($request->q);
    }

    public function class(string $class, GetSelectedItemsSelect2ByStringValuesAction $action)
    {
        $result = $action->run('class', $class);
        if($result) return $result;
        abort(404);
    }
}
