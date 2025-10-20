@extends ('layout.page')

@section('subheader')
    <x-subheader title="Направления"/>
@endsection

@section ('content')
    <div class="container">
        <x-tables.filters clear-href="{{ route('employer.events.directions.view') }}">
            @include('events.audience._index._search')
        </x-tables.filters>

        <x-card>
            <x-slot name="title">{{ __('Направления мероприятий') }}</x-slot>
            <x-slot name="toolbar">
                <x-inputs.button-link icon="la-plus" link="{{ route('employer.events.directions.create') }}" title="Новое направление"/>
            </x-slot>
            <x-tables.status/>

            @if ($directions->count() > 0)
                @include('events.directions._index._table')
            @else
                <x-tables.empty-alert text="{{ __('По вашему запросу не найдено ни одного направления.') }}"/>
            @endif
        </x-card>
    </div>
@endsection
