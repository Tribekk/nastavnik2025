@extends('layout.page')

@section('subheader')
    <x-subheader title="Профтрекер" />
@endsection

@section('content')
@php
//dd($availableQuizzes);
$questionnaire = Auth::user()
            ->availableQuizzes()
            ->whereHas('quiz', function ($q) {
                $q->where('quiz_id', 14);
            })->first();

@endphp
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="card card-custom gutter-b">

                    <div class="card-body">
                        <h3 class="font-pixel font-dark font-size-h1 mb-10">
                            Пройдите тесты
                        </h3>
{{--                        <img src="{{ asset('img/boy.png') }}" style="height: 150px"/>--}}
                        <div class="col-md-6 p-0">
                            <div class="row">
                                <div class="col-md-7">
                                    <h4 class="font-size-h3 font-hero mb-5 bg-orange p-5 text-center border-radius rounded-pill text-white"
                                        style="background-color: #2D38FC !important;border-color: #2D38FC !important;">
                                        Анкета
                                    </h4>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                    <livewire:quiz.quiz-card availableQuizId="{{ $questionnaire->id }}"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-7">
                                        @if($availableCasesQuizzes && $availableCasesQuizzes[0]->state->fillable())
                                            <button
                                               class="btn btn-info px-md-10 text-white py-4 px-5 font-size-h3 font-weight-bolder my-2 rounded-pill col-12" style="line-height: 1.2">
                                                Личностные характеристики
                                            </button>
                                        @else
                                            <h4 class="font-size-h3 font-hero mb-5 bg-orange p-5 text-center border-radius rounded-pill text-white" style="background-color: #8073e1 !important;border-color: #8073e1 !important;">
                                                Личностные характеристики
                                            </h4>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col-md-7">
                                    <div class="row align-items-center">
                                        <h4 class="font-size-h3 font-hero mb-5 bg-green p-5 text-center border-radius rounded-pill text-white">
                                            Профессиональные характеристики
                                        </h4>
                                    </div>
                                </div>
                            </div>

                            {{--Кейсы--}}
                            <div class="col-md-12">
                                <div class="row align-items-center personal">
                                    @foreach($availableCasesQuizzes as $availableQuiz)
                                        <livewire:quiz.quiz-card availableQuizId="{{ $availableQuiz->id }}"/>
                                    @endforeach
                                </div>
                            </div>
                            {{--Кейсы--}}

                            {{--Вопросы (Личностные характеристики)--}}
                            <div class="col-md-6">
                                <div class="row align-items-center personal">
                                    @foreach($availablePersonalCharQuestionsQuizzes as $availableQuiz)
                                        <livewire:quiz.quiz-card availableQuizId="{{ $availableQuiz->id }}"/>
                                    @endforeach
                                </div>
                            </div>
                            {{--Вопросы (Личностные характеристики)--}}

                            {{--Вопросы (Профессиональные характеристики)--}}
                            <div class="col-md-6">

                                    <div class="row align-items-center professional">

                                        @foreach($availableProfCharQuestionsQuizzes as $availableQuiz)
                                            <livewire:quiz.quiz-card availableQuizId="{{ $availableQuiz->id }}"/>
                                        @endforeach

                                    </div>

                            </div>
                        </div>
                        {{--Вопросы (Профессиональные характеристики)--}}

                        @if($availableDepthQuizzes->count())
                            <div class="mt-12" id="depth-tests">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-7">
                                                <h4 class="font-size-h4 font-hero mb-5 mt-10 mt-md-0 bg-alla p-5 text-center border-radius rounded-pill text-white">Углубленное тестирование</h4>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-column justify-content-between">
                                            @foreach($availableDepthQuizzes as $availableQuiz)
                                                <livewire:quiz.quiz-card availableQuizId="{{ $availableQuiz->id }}"/>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
