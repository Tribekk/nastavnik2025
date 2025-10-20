<?php

namespace App\Dashboard\Controllers;

use Illuminate\Support\Facades\Auth;
use Support\Controller;

class StudentDashboardController extends Controller
{
    public function index()
    {

        $personal_quiz_available=@Auth::user()->personal_quiz_available;
        $personal_quiz_description=@Auth::user()->personal_quiz_description;


       /// dd($personal_quiz_available,$personal_quiz_description);

        $questionnaire = Auth::user()
            ->availableQuizzes()
            ->whereHas('quiz', function ($q) {
                $q->where('slug', 'student-questionnaire');
            })->first();

        return view('student.dashboard',compact('personal_quiz_available','personal_quiz_description','questionnaire'));
    }
}

