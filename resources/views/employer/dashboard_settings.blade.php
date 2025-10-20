@extends('layout.base')

@section('subheader')
    <x-subheader title="Профтрекер"/>
@endsection

@section('content')
    <div class="container">
        <x-card>
            <x-slot name="title">Настройки</x-slot>
            <x-slot name="toolbar">
                <x-inputs.button-link type="btn-outline-success" link="{{ route('dashboard') }}" title="{{ __('Вернуться назад') }}"/>
            </x-slot>

            <div class="row">
                <div class="col-md-8">
                    <form action="{{ route('dashboard.settings.store') }}" method="post">
                        @csrf

                        <x-tables.status/>

                        <h3 class="font-size-h3 font-weight-bold">Этапы тестов и консультаций</h3>

                        <x-inputs.switch-input name="students_count"
                                               id="students_count"
                                               value="{{ old('students_count', Auth::user()->employerDashboardSettings['students_count']) }}"
                                               title="Списочная численность наставников"></x-inputs.switch-input>

                        <x-inputs.switch-input name="registration_students_count"
                                               id="registration_students_count"
                                               value="{{ old('registration_students_count', Auth::user()->employerDashboardSettings['registration_students_count']) }}"
                                               title="Зарегистрировано наставников"></x-inputs.switch-input>

                        <x-inputs.switch-input name="base_test"
                                               id="base_test"
                                               value="{{ old('base_test', Auth::user()->employerDashboardSettings['base_test']) }}"
                                               title="Пройден базовый тест"></x-inputs.switch-input>

                        <x-inputs.switch-input name="participated_events"
                                               id="participated_events"
                                               value="{{ old('participated_events', Auth::user()->employerDashboardSettings['participated_events']) }}"
                                               title="Участвовали в мероприятиях"></x-inputs.switch-input>

                        <x-inputs.switch-input name="matched_selection_base_step"
                                               id="matched_selection_base_step"
                                               value="{{ old('matched_selection_base_step', Auth::user()->employerDashboardSettings['matched_selection_base_step']) }}"
                                               title="Соответствует базовому профилю"></x-inputs.switch-input>

                        <x-inputs.switch-input name="invite_depth_test"
                                               id="invite_depth_test"
                                               value="{{ old('invite_depth_test', Auth::user()->employerDashboardSettings['invite_depth_test']) }}"
                                               title="Приглашены на углубленный тест"></x-inputs.switch-input>

                        <x-inputs.switch-input name="depth_test"
                                               id="depth_test"
                                               value="{{ old('depth_test', Auth::user()->employerDashboardSettings['depth_test']) }}"
                                               title="Результаты углубленного теста"></x-inputs.switch-input>

                        <x-inputs.switch-input name="target_selection_depth_step"
                                               id="target_selection_depth_step"
                                               value="{{ old('target_selection_depth_step', Auth::user()->employerDashboardSettings['target_selection_depth_step']) }}"
                                               title="Соответствует целевому профилю"></x-inputs.switch-input>

                        <x-inputs.switch-input name="got_consultation"
                                               id="got_consultation"
                                               value="{{ old('got_consultation', Auth::user()->employerDashboardSettings['got_consultation']) }}"
                                               title="Дети получили консультацию, в том числе с родителями"></x-inputs.switch-input>

                        <x-inputs.switch-input name="parent_registration"
                                               id="parent_registration"
                                               value="{{ old('parent_registration', Auth::user()->employerDashboardSettings['parent_registration']) }}"
                                               title="Зарегистрировано родителей"></x-inputs.switch-input>

                        <x-inputs.switch-input name="recommend"
                                               id="recommend"
                                               value="{{ old('recommend', Auth::user()->employerDashboardSettings['recommend']) }}"
                                               title="Рекомендованные"></x-inputs.switch-input>

                        <div class="separator separator-solid my-7"></div>

                        <h3 class="font-size-h3 font-weight-bold">Итоги отбора</h3>

                        <x-inputs.switch-input name="proposed_admission"
                                               id="proposed_admission"
                                               value="{{ old('proposed_admission', Auth::user()->employerDashboardSettings['proposed_admission']) }}"
                                               title="Прошел тестирование, кейсы и анкету"></x-inputs.switch-input>

                        <x-inputs.switch-input name="applied_admission"
                                               id="applied_admission"
                                               value="{{ old('applied_admission', Auth::user()->employerDashboardSettings['applied_admission']) }}"
                                               title="Назначено обучение"></x-inputs.switch-input>

                        <x-inputs.switch-input name="enrolled_profile_uz"
                                               id="enrolled_profile_uz"
                                               value="{{ old('enrolled_profile_uz', Auth::user()->employerDashboardSettings['enrolled_profile_uz']) }}"
                                               title="Прошел обучение"></x-inputs.switch-input>

                        <x-inputs.switch-input name="concluded_target_agreement"
                                               id="concluded_target_agreement"
                                               value="{{ old('concluded_target_agreement', Auth::user()->employerDashboardSettings['concluded_target_agreement']) }}"
                                               title="Присвоен статус наставника"></x-inputs.switch-input>

                        <x-inputs.submit title="{{ __('Сохранить') }}"/>
                    </form>
                </div>
            </div>
        </x-card>
    </div>
@endsection
