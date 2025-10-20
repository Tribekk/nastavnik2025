@extends('layout.page')

@section('subheader')
    <x-subheader title="Профтрекер"/>
@endsection

@section('content')
    <div class="container">
        @if(Auth::user()->school_id)
            @if(Auth::user()->hasRole('curator'))
                <div class="mb-8">
                    <livewire:school.class-container :school="$school"></livewire:school.class-container>
                </div>
            @endif

            <livewire:school.card :school="$school"></livewire:school.card>
        @else
            <div class="card">
                <div class="card-header">
                    <h1 class="font-hero font-size-h4 text-primary">Карточка компании</h1>
                </div>
                <div class="card-body">
                    <x-alert type="info" text="Для дальнейшего использования учётной записи требуется привязка компании" :close="false"></x-alert>
                </div>
            </div>
        @endif
    </div>
@endsection
