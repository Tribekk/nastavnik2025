@extends ('layout.page')

@section('subheader')
    <x-subheader title="Список мероприятий"/>
@endsection

@section ('content')
    <div class="container">
        <x-tables.filters clear-href="{{ route('employer.events.view') }}">
            @include('events._index._search')
        </x-tables.filters>

        <x-card>
            <x-slot name="title">{{ __('Мероприятия') }}</x-slot>
            <x-slot name="toolbar">
                <x-inputs.button-link icon="la-plus" link="{{ route('employer.events.create') }}" title="Новое мероприятие"/>
            </x-slot>
            <x-tables.status/>

            @if ($events->count() > 0)
                @include('events._index._table')
            @else
                <x-tables.empty-alert text="{{ __('По вашему запросу не найдено ни одного мероприятия.') }}"/>
            @endif
        </x-card>
    </div>
@endsection
