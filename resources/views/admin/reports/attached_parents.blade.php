@extends('layout.base')

@section('subheader')
    <x-subheader title="Отчеты"></x-subheader>
@endsection

@section('content')
    <div class="container">
        <x-tables.filters clear-href="{{ route('admin.reports.attached_parents') }}">
            @include('admin.reports._attached_parents._search')
        </x-tables.filters>

        <x-card>
            <x-slot name="title">{{ __('Прикрепление родителей') }}</x-slot>

            @if ($results->count() > 0)
                @include('admin.reports._attached_parents._table')
            @else
                <x-tables.empty-alert text="{{ __('По вашему запросу ничего не найдено.') }}"/>
            @endif
        </x-card>
    </div>
@endsection
