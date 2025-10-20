@extends('layout.page')

@section('subheader')
    <x-subheader title="Проекты"/>
@endsection

@section('content')
    <div class="d-flex flex-column-fluid">
        <div class="container">

 <x-card>
            <x-slot name="title">{{ __('Добавить новые проекты') }}</x-slot>
            <x-slot name="toolbar">
                <x-inputs.button-link link="{{ route('employer.project.create') }}" title="{{ __('Добавить новые Проекты') }}" icon="la-plus"/>
            </x-slot>
            <x-tables.status/>




        </x-card>           <div class="card card-custom gutter-b">

            </div>


        </div>
    </div>
@endsection
