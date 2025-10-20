@extends('layout.base')

@section('subheader')
    <x-subheader title="Отчеты"></x-subheader>
@endsection

@section('content')
    <div class="container">
        <x-tables.filters clear-href="{{ route('admin.reports.student_questionnaires') }}">
            @include('admin.reports._student-questionnaires._search')
        </x-tables.filters>

        <x-card>
            <x-slot name="title">{{ __('Анкеты наставников') }}</x-slot>

            @if ($questionnaires->count() > 0)
                @include('admin.reports._student-questionnaires._table')
            @else
                <x-tables.empty-alert text="{{ __('По вашему запросу не найдено ни одной анкеты.') }}"/>
            @endif
        </x-card>
    </div>
@endsection
