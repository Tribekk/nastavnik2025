@extends('layout.base')

@section('subheader')
    <x-subheader title="Результаты первичного тестирования"/>
@endsection

@section('content')
    <div class="container mb-8">
        <div class="card card-custom">
            <div class="card-header flex-wrap border-0 pt-6 pb-6">
                <h3 class="card-title font-size-h2 font-weight-bold align-items-start flex-column">
                    {{ __('Отчет') }}
                </h3>
                <div class="card-toolbar">
                    <a href="@if(request()->input('backTo', false)) {{ request()->backTo }} @else {{ route('parent.children') }} @endif" class="ml-2 btn btn-outline-success min-w-sm-auto min-w-180px mb-2 mb-sm-0"><i class="la la-reply mr-2"></i>Вернуться назад</a>
                    @if($user->school_id && $user->class_id)
                        <a href="{{ route('parent.children.results.pdf', $user) }}" target="_blank" class="ml-2 btn btn-success min-w-sm-auto min-w-180px mb-2 mb-sm-0"><i class="la la-file-pdf mr-2"></i>Открыть для печати PDF</a>
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
