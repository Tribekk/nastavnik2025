@extends ('layout.page')

@section('subheader')
    <x-subheader title="Управление списком организаций"/>
@endsection

@section ('content')
    <div class="container">
        <x-tables.filters clear-href="{{ route('admin.orgunits.view') }}">
            @include('admin.orgunits._index._search')
        </x-tables.filters>

        <x-card>
            <x-slot name="title">{{ __('Организации') }}</x-slot>
            <x-slot name="toolbar">
                <x-inputs.button-link link="{{ route('admin.orgunits.create') }}" title="{{ __('Новая организация') }}" icon="la-plus"/>
            </x-slot>
            <x-tables.status/>

            @if ($orgunits->count() > 0)
                @include('admin.orgunits._index._table')
            @else
                <x-tables.empty-alert text="{{ __('По вашему запросу не найдено ни одной организации.') }}"/>
            @endif
        </x-card>
    </div>
@endsection
