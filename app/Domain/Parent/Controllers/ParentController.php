<?php

namespace Domain\Parent\Controllers;


use App\Quiz\Controllers\QuizController;
use Barryvdh\DomPDF\Facade as PDF;
use Domain\User\Models\User;
use Illuminate\Http\Request;
use Support\Controller;

class ParentController extends Controller
{
    public function children(Request $request)
    {
        $observed = $request->user()->observedUsers()->get('observed_user_id')->pluck('observed_user_id');
        $children = User::whereIn('id', $observed)->get();
        $parent = $request->user();

        return view('parent.children')
            ->withParent($parent)
            ->withChildren($children);
    }

    public function childResults(Request $request, User $child)
    {
        if(!$request->user()->observedUsers()->where('observed_user_id', $child->id)->count()) {
            abort(403);
        }

        $qC = new QuizController();
        $data = $qC->takeUserResults($child);
        if(empty($data)) return view('parent.quiz.results_not_finished_tests')
            ->withUser($child);

        return view('parent.quiz.results', $data);
    }

    public function createPdf(Request $request, User $child)
    {
        if(!$request->user()->observedUsers()->where('observed_user_id', $child->id)->count()) {
            abort(403);
        }

        $qC = new QuizController();
        $data = $qC->takeUserResults($child);
        if(empty($data)) return view('parent.quiz.results_not_finished_tests')
            ->withUser($child);


        $pdf = PDF::loadView('quiz.results-pdf', $data)
            ->setPaper('a4', 'landscape');
        return $pdf->stream('результаты.pdf');
    }
}
