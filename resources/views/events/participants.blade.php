@extends ('layout.page')

@section('subheader')
    <x-subheader title="Список участников мероприятия"/>
@endsection

@section ('content')
    <div class="container">
        <x-tables.filters clear-href="{{ route('employer.events.participants', $event) }}">
            @include('events._participants._search')
        </x-tables.filters>

        <x-card>
            <x-slot name="title">{{ __('Участники мероприятия') }}</x-slot>
            <x-slot name="toolbar">
                <x-inputs.button-link type="btn-outline-success" link="{{ route('employer.events.edit', $event) }}" title="Вернуться назад"/>
                <x-inputs.button-link type="btn-outline-success" link="{{ route('employer.events.view') }}" title="К списку мероприятий"/>
            </x-slot>
            <x-tables.status/>

            @if ($participants->count() > 0)
                @include('events._participants._table')
            @else
                <x-tables.empty-alert text="{{ __('По вашему запросу не найдено ни одного участника.') }}"/>
            @endif
        </x-card>
    </div>
@endsection
