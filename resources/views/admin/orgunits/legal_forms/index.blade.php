@extends ('layout.page')

@section('subheader')
    <x-subheader title="Управление списком организационно-правовых форм"/>
@endsection

@section ('content')
    <div class="container">
        <x-tables.filters clear-href="{{ route('admin.orgunits.legal_forms.view') }}">
            @include('admin.orgunits.legal_forms._index._search')
        </x-tables.filters>

        <x-card>
            <x-slot name="title">{{ __('Организационно-правовые формы') }}</x-slot>
            <x-slot name="toolbar">
                <x-inputs.button-link link="{{ route('admin.orgunits.legal_forms.create') }}" title="{{ __('Новая форма') }}" icon="la-plus"/>
            </x-slot>
            <x-tables.status/>

            @if ($legalForms->count() > 0)
                @include('admin.orgunits.legal_forms._index._table')
            @else
                <x-tables.empty-alert text="{{ __('По вашему запросу не найдено ни одной организационно правовой формы.') }}"/>
            @endif
        </x-card>
    </div>
@endsection
