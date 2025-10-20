@extends('layout.base')

@section('subheader')
    <x-subheader title="Отчеты"></x-subheader>
@endsection

@section('content')
    <div class="container">
        <x-tables.filters clear-href="{{ route('admin.reports.students_tests') }}">
            @include('admin.reports._students_tests._search')
        </x-tables.filters>

        <x-card>
            <x-slot name="title">{{ __('Ход тестирования наставников') }}</x-slot>

            @if ($results->count() > 0)
                @include('admin.reports._students_tests._table')
            @else
                <x-tables.empty-alert text="{{ __('По вашему запросу ничего не найдено.') }}"/>
            @endif
        </x-card>
    </div>
@endsection
