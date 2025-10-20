@extends ('layout.page')

@section('subheader')
    <x-subheader title="Список организаций"/>
@endsection

@section ('content')
    <div class="container">
        <x-tables.filters clear-href="{{ route('orgunits.view') }}">
            @include('orgunits._index._search')
        </x-tables.filters>

        <x-card>
            <x-slot name="title">{{ __('Организации') }}</x-slot>
            <x-tables.status/>

            @if ($orgunits->count() > 0)
                @include('orgunits._index._table')
            @else
                <x-tables.empty-alert text="{{ __('По вашему запросу не найдено ни одной организации.') }}"/>
            @endif
        </x-card>
    </div>
@endsection
