@extends ('layout.page')

@section('subheader')
    <x-subheader title="Управление списком пользователей"/>
@endsection

@section ('content')
    <div class="container">
        <x-tables.filters clear-href="{{ route('admin.users.view') }}">
            @include('admin.users._index._search')
        </x-tables.filters>
        <x-card>
            <x-slot name="title">{{ __('Пользователи') }}</x-slot>
            <x-slot name="toolbar">
                <x-inputs.button-link link="{{ route('admin.users.create') }}" title="{{ __('Новый пользователь') }}" icon="la-plus"/>
            </x-slot>

            <x-tables.status/>

            @if ($users->count() > 0)
                @include('admin.users._index._table')
            @else
                <x-tables.empty-alert text="{{ __('По вашему запросу не найдено ни одного пользователя.') }}"></x-tables.empty-alert>
            @endif
        </x-card>
    </div>
@endsection
