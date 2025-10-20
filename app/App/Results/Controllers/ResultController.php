<?php

namespace App\Results\Controllers;

use App\Results\Actions\GetParentsHasQuestionnaireResultAction;
use App\Results\Actions\GetStudentsHasQuestionnaireResultAction;
use Illuminate\Http\Request;
use Support\Controller;

class ResultController extends Controller
{
    public function studentQuestionnaire(Request $request, GetStudentsHasQuestionnaireResultAction $action)
    {
        return view('results.student-questionnaire')
            ->withUsers($action->run($request->all()));
    }

    public function parentQuestionnaire(Request $request, GetParentsHasQuestionnaireResultAction $action)
    {
        return view('results.parent-questionnaire')
            ->withUsers($action->run($request->all()));
    }
}
