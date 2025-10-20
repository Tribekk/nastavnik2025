@extends ('layout.page')

@section('subheader')
    <x-subheader title="Управление списком направлений деятельности"/>
@endsection

@section ('content')
    <div class="container">
        <x-tables.filters clear-href="{{ route('admin.orgunits.activity_kinds.view') }}">
            @include('admin.orgunits.activity_kinds._index._search')
        </x-tables.filters>

        <x-card>
            <x-slot name="title">{{ __('Направления деятельности') }}</x-slot>
            <x-slot name="toolbar">
                <x-inputs.button-link link="{{ route('admin.orgunits.activity_kinds.create') }}" title="{{ __('Новое направление') }}" icon="la-plus"/>
            </x-slot>
            <x-tables.status/>

            @if ($activityKinds->count() > 0)
                @include('admin.orgunits.activity_kinds._index._table')
            @else
                <x-tables.empty-alert text="{{ __('По вашему запросу не найдено ни одного направления деятельности.') }}"/>
            @endif
        </x-card>
    </div>
@endsection
