@extends('layout.pdf')

@section('content')
{{--    @include('quiz._results._pdf.home-screen')--}}
{{--    @include('quiz._results._pdf.quizzes-screen')--}}

{{--    <!-- АНКЕТА -->--}}
{{--    @include('quiz._results._pdf.questionnaire-screen__about-me')--}}
{{--    @include('quiz._results._pdf.questionnaire-screen__motive-of-choice')--}}
{{--    @include('quiz._results._pdf.questionnaire-screen__willingness-to-choice')--}}

{{--    <!-- БАЗОВЫЕ ТЕСТЫ -->--}}
{{--    @include('quiz._results._pdf.test-screen__character-traits')--}}
{{--    @include('quiz._results._pdf.test-screen__interests')--}}
{{--    @include('quiz._results._pdf.test-screen__suitable-professions')--}}
{{--    @include('quiz._results._pdf.test-screen__person-types')--}}

{{--    <!-- РЕЗУЛЬТАТЫ ПО БАЗОВОМУ ТЕСТИРОВАНИЮ -->--}}
{{--    @include('quiz._results._pdf.screen__base-results')--}}
@include('quiz._results._pdf.test-screen__type-of-thinking')
@include('quiz._results._pdf.questionnaire-compare-screen')
    <!-- УГЛУБЛЕННОЕ ТЕСТИРОВАНИЕ -->
    @if($depthTestsFinished)
        @include('quiz._results._pdf.test-screen__inclinations')
        @include('quiz._results._pdf.test-screen__intelligence-level')

        @include('quiz._results._pdf.test-screen__solution-of-cases')


    @endif

    <!-- the end. -->
    @include('quiz._results._pdf.end-screen')

@endsection
