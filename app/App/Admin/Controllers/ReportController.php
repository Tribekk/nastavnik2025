<?php

namespace App\Admin\Controllers;

use App\Admin\Actions\GetAttachedParentsAction;
use App\Admin\Actions\GetStudentQuestionnairesAction;
use App\Admin\Actions\GetRegistrationsAction;
use App\Admin\Actions\GetResultsSchoolClassesStudentsTestsAction;
use App\Admin\Actions\GetStudentsAction;
use App\Admin\Actions\GetTestsReportAction;
use App\Exports\ExportResultsStudentsBaseTests;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Support\Controller;

class ReportController extends Controller
{
    public function studentsTests(Request $request, GetResultsSchoolClassesStudentsTestsAction $action)
    {
        $results = $action->run($request);
        return view('admin.reports.students_tests')
            ->withResults($results);
    }

    public function exportStudentsBaseTests(Request $request)
    {
        return Excel::download(new ExportResultsStudentsBaseTests, 'отчет__ученики_базовое_тестирование.xlsx');
    }

    public function registrations(Request $request, GetRegistrationsAction $action)
    {
        return view('admin.reports.registrations')
                ->withRegistrations($action->run($request->input()));
    }

    public function studentQuestionnaires(Request $request, GetStudentQuestionnairesAction $action)
    {

        return view('admin.reports.student_questionnaires')
            ->withQuestionnaires($action->run($request->input()));
    }

    public function attachedParents(Request $request, GetAttachedParentsAction $action)
    {
        return view('admin.reports.attached_parents')
            ->withResults($action->run($request->input()));
    }

    public function tests(Request $request, GetTestsReportAction $action)
    {
        return view('admin.reports.tests')
            ->withResults($action->run($request->input()));
    }

    public function students(Request $request, GetStudentsAction $action)
    {
        return view('admin.reports.students')
            ->withUsers($action->run($request->q, $request->input()));
    }
}
