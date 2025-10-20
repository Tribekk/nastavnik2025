@section('subheader')
    <x-subheader title="Управление разрешениями"/>
@endsection

<div class="container">
    <x-tables.filters without-actions>
        @include('admin.authorization.permissions._index._search')
    </x-tables.filters>

    <x-card>
        <x-slot name="title">{{ __('Разрешения') }}</x-slot>

        @if ($permissions->count() > 0)
            @include('admin.authorization.permissions._index._table')
        @else
            <x-tables.empty-alert text="{{ __('По вашему запросу не найдено ни одного разрешения.') }}"></x-tables.empty-alert>
        @endif
    </x-card>
</div>
