@extends ('layout.page')

@section('subheader')
    <x-subheader title="Список приглашений"/>
@endsection

@section ('content')
    <div class="container">
        <x-tables.filters clear-href="{{ route('events.invites.view') }}">
            @include('events.user.invites._index._search')
        </x-tables.filters>

        <x-card>
            <x-slot name="title">{{ __('Приглашения на мероприятия') }}</x-slot>
            <x-tables.status/>

            @if ($invites->count() > 0)
                @include('events.user.invites._index._table')
            @else
                <x-tables.empty-alert text="{{ __('По вашему запросу не найдено ни одного приглашения.') }}"/>
            @endif
        </x-card>
    </div>
@endsection
