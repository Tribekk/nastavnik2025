@extends('layout.base')

@section('subheader')
    <x-subheader title="Результат, твой профиль"/>
@endsection

@section('content')
    <div class="container mb-8">
        <div class="card card-custom">
            <div class="card-header flex-wrap border-0 pt-6 pb-6">
                <h3 class="card-title font-size-h2 font-weight-bold align-items-start flex-column">
                    {{ __('Отчет') }}
                </h3>
                <div class="card-toolbar">
                    @if($user->school_id && $user->class_id)
                        <x-inputs.button-link target="_blank" link="{{ Route::is('quiz.user_results') ? route('quiz.user_results.pdf', $user) : route('quiz.results.pdf') }}" type="btn-success" icon="la-file-pdf" title="Открыть для печати PDF"/>
                    @endif
                    @if(request('backTo', false))
                        <x-inputs.button-link link="{!! urldecode(request('backTo')) !!}" type="btn-outline-success" title="Вернуться назад"/>
                    @endif
                </div>
            </div>

            @if(!($user->school_id && $user->class_id))
                <div class="card-body">
                    <x-alert type="info" text="Для отображения результата необходимо привязать структурное подразделение в настройках профиля" :close="false"/>
                </div>
            @endif
        </div>
    </div>

    @if($user->school_id && $user->class_id)
        @include("quiz._results.content")
    @endif
@endsection
