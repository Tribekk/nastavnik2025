@extends('layout.base')

@section('subheader')
    <x-subheader title="Отчет по базе наставников"></x-subheader>
@endsection

@section('content')
    @php


        function clearUrl(string $routeName, bool $clearType = true): string {
            $params = $_GET;
            if($clearType) unset($params['type']);
            unset($params['q']);
            unset($params['page']);
            unset($params['school']);
            unset($params['class']);
            unset($params['parent_questionnaire']);
            unset($params['student_questionnaire']);
            unset($params['base_tests']);
            unset($params['base_selection']);
            unset($params['invited_depth_tests']);
            unset($params['depth_tests']);
            unset($params['child_got_consultation']);
            unset($params['got_consultation_with_parent']);
            unset($params['depth_selection']);
            unset($params['recommend']);
            unset($params['agree']);
            return urldecode(route($routeName, $params));
        }
    @endphp
<style>
    .text-success{
        color: green !important;
    }
</style>
    <div class="container">
        <x-tables.filters clear-href="{!! clearUrl('employer.reports.students', false) !!}">
            @include('employer.reports._students.search')
        </x-tables.filters>
        <x-card>
            <x-slot name="title">{{ $title }}</x-slot>
            <x-slot name="toolbar">
                <div class="d-flex align-items-start">
                    <livewire:employer.sync-reports-data label="{{ $latestSyncDataLabel }}"/>
                    @if(request('type', false))
                        <x-inputs.button-link type="btn-outline-success" link="{!! clearUrl('dashboard') !!}" title="Вернуться назад"/>
                    @endif
                </div>
            </x-slot>

            <div class="button-group">
                <button class="btn btn-success px-4 mt-1" onclick="sendNotify()">Отправить сообщение</button>
                <button class="btn btn-success px-4 mt-1" onclick="sendInviteEvent()">Пригласить на мероприятие</button>
                <button class="btn btn-success px-4 mt-1" onclick="sendInviteTests(null, 'base')">Пригласить на базовое тестирование</button>
                <button class="btn btn-success px-4 mt-1" onclick="sendInviteTests(null, 'depth')">Пригласить на углубленное тестирование</button>
                <button class="btn btn-success px-4 mt-1" onclick="sendInviteTests(null, 'personal_quiz')">Пригласить на квиз</button>
                           </div>


            @if($users->count())
               @include('employer.reports._students._table')
            @else
                <x-tables.empty-alert text="{{ __('По вашему запросу не найдено ни одного наставника.') }}"/>
            @endif
        </x-card>
    </div>
@endsection
