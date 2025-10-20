@extends('layout.base')

@section('subheader')
    <x-subheader title="Отчеты"></x-subheader>
@endsection

@section('content')
    <div class="container">
        <x-tables.filters clear-href="{{ route('admin.reports.registrations') }}">
            @include('admin.reports._registrations._search')
        </x-tables.filters>

        <x-card>
            <x-slot name="title">{{ __('Регистрации') }}</x-slot>

            @if ($registrations->count() > 0)
                @include('admin.reports._registrations._table')
            @else
                <x-tables.empty-alert text="{{ __('По вашему запросу не найдено ни одной регистрации.') }}"/>
            @endif
        </x-card>
    </div>
@endsection
