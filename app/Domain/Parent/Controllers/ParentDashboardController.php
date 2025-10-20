<?php

namespace Domain\Parent\Controllers;


use Domain\User\Models\User;
use Illuminate\Support\Facades\Auth;
use Support\Controller;

class ParentDashboardController extends Controller
{
    public function index()
    {
        $questionnaire = Auth::user()
        ->availableQuizzes()
        ->whereHas('quiz', function($q) {
            $q->where('slug', 'parent-questionnaire');
        })->first();

        if($questionnaire->state->fillable()) {
            return view('quiz._instruction.parent-questionnaire-instruction')
                ->withQuestionnaire($questionnaire);
        } else {
            $observed = Auth::user()->observedUsers()->get('observed_user_id')->pluck('observed_user_id');
            $children = User::whereIn('id', $observed)->get();

            return view('parent.dashboard')
                ->withChildren($children)
                ->withQuestionnaire($questionnaire);
        }
    }
}
