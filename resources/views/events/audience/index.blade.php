@extends ('layout.page')

@section('subheader')
    <x-subheader title="Аудитория"/>
@endsection

@section ('content')
    <div class="container">
        <x-tables.filters clear-href="{{ route('employer.events.audience.view') }}">
            @include('events.audience._index._search')
        </x-tables.filters>

        <x-card>
            <x-slot name="title">{{ __('Аудитория мероприятия') }}</x-slot>
            <x-slot name="toolbar">
                <x-inputs.button-link icon="la-plus" link="{{ route('employer.events.audience.create') }}" title="Новая аудитория"/>
            </x-slot>
            <x-tables.status/>

            @if ($audience->count() > 0)
                @include('events.audience._index._table')
            @else
                <x-tables.empty-alert text="{{ __('По вашему запросу не найдено ни одной аудитории.') }}"/>
            @endif
        </x-card>
    </div>
@endsection
