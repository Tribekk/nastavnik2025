@extends('layout.base')

@section('subheader')
    <x-subheader title="Профтрекер"  class="font-pixel text-uppercase text-center text-white" />
@endsection

@section('content')
    <div class="container">
        <x-tables.filters clear-href="{{ route('employer.students.list') }}">
            @include('employer.students.list._list._search')
        </x-tables.filters>
        <x-card>
            <x-slot name="title">{{ __('Наставники') }}</x-slot>
            <x-slot name="toolbar">
                <form action="{{ route('employer.students.list.excel', request()->input()) }}" method="post" target="_blank">
                    @csrf
                    <x-inputs.submit title="Выгрузить в Excel"/>
                </form>
                <form action="{{ route('employer.students.invite.depth_test.all', request()->input()) }}" method="post">
                    @csrf
                    <x-inputs.submit title="Пригласить всех на глубинный тест"/>
                </form>
            </x-slot>

            @if ($students->count() > 0)
                @include('employer.students.list._list._table')
            @else
                <x-tables.empty-alert text="{{ __('По вашему запросу не найдено ни одного пользователя.') }}"></x-tables.empty-alert>
            @endif
        </x-card>
    </div>
@endsection
