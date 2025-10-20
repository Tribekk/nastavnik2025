@extends('layout.base')

@section('subheader')
    <x-subheader title="Профтрекер"/>
@endsection

@php
    function getUrlParams(): array {
        $params = $_GET;
        unset($params['page']);
        return $params;
    }

    function reportUrl($routeName, $type): string {
        $params = getUrlParams();
        $params['type'] = $type;
        return route($routeName, $params);
    }
@endphp

@section('content')


    @php

        if(Auth::user()) {
            $user=Auth::user();
            if($user->orgunit) {
                $orgunit=$user->orgunit;


                if(!empty($orgunit->profile_target)) {
                    $orgunit->profile_target=unserialize($orgunit->profile_target);
                } else {
                    $orgunit->profile_target=array('');
                }
            }
        }

    @endphp


    <div class="container">
       <table>
           <tr>
               @foreach($profiles as $profile)
               <td>
                   <a href="{{  route('employer.reports.students')  }}">
                   <div style="width:300px;height:250px;padding:15px;border:1px solid black;border-radius:5px;margin-left:10px">
                       <b>{{ $profile->title }}</b>
                        <br>
                        <br>
                        <br>



                       Потребность - {{ @$orgunit->profile_target[$profile->id] }}<br><br>
                       Зарегистрировано - {{ @$user_profiles[$profile->id]["registration_count"]["count"]*1  }}<br>
                       Базовый отбор - {{ @$user_profiles[$profile->id]["baseTest"]["count"]*1  }}<br>
                       Консультации - 0<br>
                       Целевой отбор - {{ round(@$user_profiles[$profile->id]["baseTest"]["count"]*0.4)  }}<br>
                       Меропрития - 0

                   </div>
                   </a>

               </td>
                   @endforeach
           </tr>
       </table>


        <br><br>




        <x-tables.filters clear-href="{{ route('dashboard') }}">
            @include('employer._dashboard.search')
        </x-tables.filters>

        <x-card>
            <x-slot name="title">Этапы тестов и консультаций</x-slot>
            <x-slot name="toolbar">
                <div class="d-flex align-items-start">
                    @csrf
                    <x-inputs.button-link type="btn-success" icon="la-cog" link="{{ route('dashboard.settings') }}" title="{{ __('Настройки') }}"/>
                    <x-inputs.button-link type="btn-success" icon="la-file-pdf" link="{{ route('employer.reports.students.generate_pdf', getUrlParams()) }}" title="{{ __('Открыть для печати PDF') }}"/>
                    <livewire:employer.sync-reports-data label="{{ $latestSyncDataLabel }}"/>
                </div>
            </x-slot>

            @error('error')
            <x-alert type="danger" text="{{ $message }}"></x-alert>
            @enderror

            @if(!isset($studentsCount) && !isset($registrationStudentsCount) && !isset($baseTest) && !isset($inviteDepthTest) && !isset($depthTest) && !isset($gotConsultation) && !isset($parentRegistration) && !isset($recommend) && !isset($matchedSelectionBaseStep) && !isset($targetSelectionDepthStep))
                <x-alert type="danger" text="Вы отключили все отображаемые пункты" :close="false"></x-alert>
            @endif

            @isset($studentsCount)
                @include('employer._dashboard.progress-bar', [
                    'color' => 'progress-silver',
                    'title' => 'Списочная численность кандидатов',
                    'percentage' => $studentsCount['percentage'],
                    'value' => $studentsCount['count'],
                ])
            @endisset

            @isset($registrationStudentsCount)
                @php
                //dd($registrationStudentsCount);
                @endphp
                @include('employer._dashboard.progress-bar', [
                   'color' => 'progress-orange',
                   'title' => 'Зарегистрированы наставники',
                   'percentage' => $registrationStudentsCount['percentage'],
                   'value' => $registrationStudentsCount['count'],
                   'href' => reportUrl('employer.reports.students', 'registration_students_count'),
                ])
            @endisset

            @isset($questionnaireStudentsCount)
                @include('employer._dashboard.progress-bar', [
                    'color' => 'progress-orange',
                    'title' => 'Прошли анкету',
                    'percentage' => $questionnaireStudentsCount['percentage'],
                    'value' => $questionnaireStudentsCount['count'],
                    'href' => reportUrl('employer.reports.students', 'questionnaire_students'),
                ])
            @endisset

            @isset($CasesQuestionsStudentsCount)
                @include('employer._dashboard.progress-bar', [
                    'color' => 'progress-orange',
                    'title' => 'Решили кейсы и тесты на оценку Soft и Hard',
                    'percentage' => $CasesQuestionsStudentsCount['percentage'],
                    'value' => $CasesQuestionsStudentsCount['count'],
                    'href' => reportUrl('employer.reports.students', 'cases_questions_students'),
                ])
            @endisset

            @isset($modelCompetenceRange31to100)
                @include('employer._dashboard.progress-bar', [
                    'color' => 'progress-orange',
                    'title' => 'Соответствуют модели компетенций  от 31 до 100%',
                    'percentage' => $modelCompetenceRange31to100['percentage'],
                    'value' => $modelCompetenceRange31to100['count'],
                    'href' => reportUrl('employer.reports.students', 'model_competence_range_31_to_100'),
                ])
            @endisset

            @isset($participatedEvents)
                @include('employer._dashboard.progress-bar', [
                    'color' => 'progress-orange',
                    'title' => 'Участвовали в мероприятиях',
                    'percentage' => $participatedEvents['percentage'],
                    'value' => $participatedEvents['count'],
                    'href' => reportUrl('employer.reports.students', 'participated_events'),
                ])
            @endisset

{{--            @isset($matchedSelectionBaseStep)--}}
{{--                @include('employer._dashboard.progress-bar', [--}}
{{--                    'color' => 'progress-light-green',--}}
{{--                    'title' => 'Соответствует базовому профилю',--}}
{{--                    'percentage' => $matchedSelectionBaseStep['percentage'],--}}
{{--                    'value' => $matchedSelectionBaseStep['count'],--}}
{{--                    'href' => reportUrl('employer.reports.students', 'matched_selection_base_step'),--}}
{{--                ])--}}
{{--            @endisset--}}

            @isset($inviteDepthTest)
                @include('employer._dashboard.progress-bar', [
                    'color' => 'progress-orange',
                    'title' => 'Приглашены на углубленные тесты',
                    'percentage' => $inviteDepthTest['percentage'],
                    'value' => $inviteDepthTest['count'],
                    'href' => reportUrl('employer.reports.students', 'invite_depth_test'),
                ])
            @endisset

            @isset($depthTest)
                @include('employer._dashboard.progress-bar', [
                    'color' => 'progress-orange',
                    'title' => 'Прошли углубленные тесты',
                    'percentage' => $depthTest['percentage'],
                    'value' => $depthTest['count'],
                    'href' => reportUrl('employer.reports.students', 'depth_test'),
               ])
            @endisset

            @isset($targetSelectionDepthStep)
                @include('employer._dashboard.progress-bar', [
                    'color' => 'progress-light-green',
                    'title' => 'Соответствуют целевому профилю',
                    'percentage' => $targetSelectionDepthStep['percentage'],
                    'value' => $targetSelectionDepthStep['count'],
                    'href' => reportUrl('employer.reports.students', 'target_selection_depth_step'),
                ])
            @endisset

            @isset($gotConsultation)
                @include('employer._dashboard._consultation-progress-bar', [
                    'title' => 'Получили консультацию HR / консультанта / психолога',
                    'percentageChild' => $gotConsultation['percentage_child'],
                    'valueChild' => $gotConsultation['count_child'],
                    'percentageParent' => $gotConsultation['percentage_parent'],
                    'valueParent' => $gotConsultation['count_parent'],
                    'href' => reportUrl('employer.reports.students', 'got_consultation'),
               ])
            @endisset

{{--            @isset($parentRegistration)--}}
{{--                @include('employer._dashboard.progress-bar', [--}}
{{--                    'color' => 'progress-orange',--}}
{{--                    'title' => 'Зарегистрировано родителей',--}}
{{--                    'percentage' => $parentRegistration['percentage'],--}}
{{--                    'value' => $parentRegistration['count'],--}}
{{--                    'href' => reportUrl('employer.reports.students', 'parent_registration'),--}}
{{--               ])--}}
{{--            @endisset--}}

            @isset($recommend)
                @include('employer._dashboard.progress-bar', [
                    'color' => 'progress-green',
                    'title' => 'Рекомендованы',
                    'percentage' => $recommend['percentage'],
                    'value' => $recommend['count'],
                    'href' => reportUrl('employer.reports.students', 'recommend'),
               ])
            @endisset

            <div class="separator separator-solid my-7"></div>

            <h5 class="font-size-h5 font-weight-bold mb-8">Итоги отбора</h5>

            @if(!isset($proposedAdmission) && !isset($appliedAdmission) && !isset($enrolledProfileUZ) && !isset($concludedTargetAgreement))
                <x-alert type="danger" text="Вы отключили все отображаемые пункты" :close="false"></x-alert>
            @endif

            @isset($proposedAdmission)
                @include('employer._dashboard.progress-bar', [
                    'color' => 'progress-blue',
                    'title' => 'Прошел тестирование, кейсы и анкету',
                    'percentage' => $proposedAdmission['percentage'],
                    'value' => $proposedAdmission['count'],
               ])
            @endisset

            @isset($appliedAdmission)
                @include('employer._dashboard.progress-bar', [
                    'color' => 'progress-blue',
                    'title' => 'Назначено обучение',
                    'percentage' => $appliedAdmission['percentage'],
                    'value' => $appliedAdmission['count'],
               ])
            @endisset

            @isset($enrolledProfileUZ)
                @include('employer._dashboard.progress-bar', [
                    'color' => 'progress-blue',
                    'title' => 'Прошел обучение ',
                    'percentage' => $enrolledProfileUZ['percentage'],
                    'value' => $enrolledProfileUZ['count'],
               ])
            @endisset

            @isset($concludedTargetAgreement)
                @include('employer._dashboard.progress-bar', [
                    'color' => 'progress-green',
                    'title' => 'Присвоен статус наставника',
                    'percentage' => $concludedTargetAgreement['percentage'],
                    'value' => $concludedTargetAgreement['count'],
               ])
            @endisset
        </x-card>




    </div>
@endsection
