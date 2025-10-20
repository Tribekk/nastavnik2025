<?php

namespace App\Quiz\ViewModels;

use Illuminate\Support\Facades\Auth;
use Spatie\ViewModels\ViewModel;

class AvailableQuizzesViewModel extends ViewModel
{

    /**
     * Доступные Базовые Квизы
     * @return mixed
     */
    public function availableBaseQuizzes()
    {

        return Auth::user()
            ->availableQuizzes()
            ->whereHas('quiz', function ($q) {
                $q->where('type', 'test');
                $q->where('group', 0);
            })->get();
    }

    /**
     * Доступные Кейсы (Личностные характеристики, Профессиональные характеристики)
     * @return mixed
     */
    public function availableCasesQuizzes()
    {
        $quizzes = Auth::user()
            ->availableQuizzes()
            ->whereHas('quiz', function ($q) {
                $q->where('type', 'test');
                $q->where('group', 2);
            })->get();

        return $quizzes;
    }

    /**
     * Доступные Вопросы (Профессиональные характеристики)
     * @return mixed
     */
    public function availableProfCharQuestionsQuizzes()
    {
        $quizzes = Auth::user()
            ->availableQuizzes()
            ->whereHas('quiz', function ($q) {
                $q->where('type', 'test');
                $q->where('group', 3);
            })->get();

        return $quizzes;
    }

    /**
     * Доступные Вопросы (Личностные характеристики)
     * @return mixed
     */
    public function availablePersonalCharQuestionsQuizzes()
    {
        $quizzes = Auth::user()
            ->availableQuizzes()
            ->whereHas('quiz', function ($q) {
                $q->where('type', 'test');
                $q->where('group', 4);
            })->get();

        return $quizzes;
    }

    public function availableDepthQuizzes()
    {
        return Auth::user()
            ->availableQuizzes()
            ->whereHas('quiz', function ($q) {
                $q->where('type', 'test');
                $q->where('group', 1);
            })->get();
    }

    public function availableQuestionnaires()
    {
        return Auth::user()
            ->availableQuizzes()
            ->whereHas('quiz', function ($q) {
                $q->where('type', 'form');
            })->get();
    }
}
