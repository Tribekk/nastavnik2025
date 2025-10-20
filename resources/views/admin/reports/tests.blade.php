@extends('layout.base')

@section('subheader')
    <x-subheader title="Отчеты"></x-subheader>
@endsection

@section('content')
    <div class="container">
        <x-tables.filters clear-href="{{ route('admin.reports.tests') }}">
            @include('admin.reports._tests._search')
        </x-tables.filters>

        <x-card>
            <x-slot name="title">{{ __('Тесты') }}</x-slot>

            @if ($results->count() > 0)
                @include('admin.reports._tests._table')
            @else
                <x-tables.empty-alert text="{{ __('По вашему запросу не найдено ни одного теста.') }}"/>
            @endif
        </x-card>
    </div>
@endsection
