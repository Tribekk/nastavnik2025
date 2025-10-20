@extends('layout.base')

@section('subheader')
    <x-subheader title="Профтрекер"/>
@endsection

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="mt-3 d-flex flex-wrap">
                    <div class="flex-grow-1">
                        <h1 class="font-size-h2 font-alla font-hero">Анкета студента</h1>
                        <h3 class="font-size-h3">{{ $user->fullName }}</h3>
                    </div>
                    @if(request('backTo', false))
                        <div class="w-sm-200px w-100 text-sm-right mt-4 mt-sm-0 mb-4 mb-sm-0">
                            <a href="{{ request('backTo') }}" class="ml-2 btn btn-outline-success"><i class="la la-reply"></i>Вернуться назад</a>
                        </div>
                    @endif
                </div>
            </div>
            <div class="card-body">
                @include('quiz.questionnaire.questions')
            </div>
        </div>
    </div>
@endsection
