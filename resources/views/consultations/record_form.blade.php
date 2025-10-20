@extends('layout.base')

@section('subheader')
    <x-subheader title="Консультация"></x-subheader>
@endsection

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1 class="font-weight-bold font-hero font-size-h4 mb-0 text-primary">
                    Запись на консультацию
                </h1>
            </div>
            <div class="card-body">
                <livewire:consultations.record-form></livewire:consultations.record-form>
            </div>
        </div>
    </div>
@endsection
