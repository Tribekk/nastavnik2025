@extends ('layout.page')

@section('subheader')
    <x-subheader title="Список моих мероприятий"/>
@endsection

@section ('content')
    <div class="container">
        <x-tables.filters clear-href="{{ route('events.view') }}">
            @include('events.user._index._search')
        </x-tables.filters>

        <x-card>
            <x-slot name="title">{{ __('Мои мероприятия') }}</x-slot>
            <x-tables.status/>

            @if ($events->count() > 0)
                @include('events.user._index._table')
            @else
                <x-tables.empty-alert text="{{ __('По вашему запросу не найдено ни одного мероприятия.') }}"/>
            @endif
        </x-card>
    </div>
@endsection
