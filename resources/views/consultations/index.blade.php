@extends('layout.base')

@section('subheader')
    <x-subheader title="Консультации"></x-subheader>
@endsection

@section('content')
    <div class="container">
        <x-tables.filters clear-href="{{ route('consultations.list') }}">
            @include('consultations._index._search')
        </x-tables.filters>
        <x-card>
            <x-slot name="title">{{ __('Консультации') }}</x-slot>

            @error('error')
                <div class="mb-4">
                    <x-alert type="danger" text="{{ $message }}"></x-alert>
                </div>
            @enderror

            @if($consultations->count() > 0)
                @include('consultations._index._table')
            @else
                <x-tables.empty-alert text="{{ __('Не удалось найти консультации соответствующие вашему запросу') }}"></x-tables.empty-alert>
            @endif
        </x-card>
    </div>
@endsection
