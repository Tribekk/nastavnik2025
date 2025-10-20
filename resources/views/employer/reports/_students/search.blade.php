<x-tables.filter-inputs.input id="q"
                              name="q"
                              classes="col-md-12"
                              icon="la la-search"
                              label="{{ __('Поиск по ФИО') }}"
                              placeholder="{{ __('Поиск по ФИО') }}"
                              value="{{ request()->q }}"></x-tables.filter-inputs.input>

<br>

<div class="col-xl-7 my-2">

    <x-inputs.select2 id="activity_kind_id" name="activity_kind_id[]"
                      required title="Соответствие профилю"
                      placeholder="Выбор профиля" event="setActivityKindId"
                      multiple
                      value="{{ is_array(request()->activity_kind_id) ? implode(',', request()->activity_kind_id) : '' }}"
                      url="{{ route('orgunits.activity_kinds.view') }}"
                      selected-url="/orgunits/activity_kinds"
    /></div>


<div class="row align-items-start col-md-12">
    <x-tables.filter-inputs.select2 classes="col-md-6"
                                    name="school[]"
                                    id="school"
                                    placeholder="Компания"
                                    label="Компания"
                                    event="filterBySchool"
                                    multiple
                                    indexUrl="{{ route('employer.stages_tests_and_consultations.schools') }}"
                                    showUrl="/employer/stages_tests_and_consultations/schools"
                                    value="{{ is_array(request()->school) ? implode(',', request()->school) : '' }}"></x-tables.filter-inputs.select2>

    <x-tables.filter-inputs.select2 classes="col-md-6"
                                    name="class[]"
                                    id="class"
                                    placeholder="Структурное подразделение"
                                    label="Структурное подразделение"
                                    event="filterByClass"
                                    multiple
                                    indexUrl="{{ route('employer.stages_tests_and_consultations.classes') }}"
                                    showUrl="/employer/stages_tests_and_consultations/classes"
                                    value="{{ is_array(request()->class) ? implode(',', request()->class) : '' }}"></x-tables.filter-inputs.select2>
</div>

<x-tables.filter-inputs.select2 classes="col-md-4"
                                name="city"
                                id="city"
                                placeholder="Город"
                                label="Город"
                                event="filterByRole"
                                indexUrl="{{ route('kladr.used_cities', ['role' => 'student']) }}"
                                showUrl="/kladr/cities"
                                value="{{ request()->city }}"></x-tables.filter-inputs.select2>

<x-tables.filter-inputs.select classes="col-md-4"
                               name="parent_questionnaire"
                               id="parent_questionnaire"
                               label="Заполнена анкета руководителя"
                               :items="[['title' => 'Показать все', 'value' => 'all'], ['title' => 'Заполнена', 'value' => 'finished'], ['title' => 'Не заполнена', 'value' => 'not_finished']]"
                               value="{{ request()->parent_questionnaire }}"></x-tables.filter-inputs.select>

<x-tables.filter-inputs.select classes="col-md-4"
                               name="student_questionnaire"
                               id="student_questionnaire"
                               label="Заполнена анкета наставника"
                               :items="[['title' => 'Показать все', 'value' => 'all'], ['title' => 'Заполнена', 'value' => 'finished'], ['title' => 'Не заполнена', 'value' => 'not_finished']]"
                               value="{{ request()->student_questionnaire }}"></x-tables.filter-inputs.select>

{{--@if(request('type') != 'base_test')--}}
{{--    <x-tables.filter-inputs.select classes="col-md-4"--}}
{{--                                   name="base_tests"--}}
{{--                                   id="base_tests"--}}
{{--                                   label="Базовый тест"--}}
{{--                                   :items="[['title' => 'Показать все', 'value' => 'all'], ['title' => 'Пройден', 'value' => 'finished'], ['title' => 'Проходит', 'value' => 'processed'], ['title' => 'Не пройден', 'value' => 'not_finished']]"--}}
{{--                                   value="{{ request()->base_tests }}"></x-tables.filter-inputs.select>--}}
{{--@endif--}}

@if(request('type') != 'base_test')
    <x-tables.filter-inputs.select classes="col-md-4"
                                   name="base_tests"
                                   id="base_tests"
                                   label="Базовый тест"
                                   :items="[
                                        ['title' => 'Показать все', 'value' => 'all'],
                                        ['title' => 'Низкий уровень (0-30)', 'value' => 'low'],
                                        ['title' => 'Средний уровень (31-70)', 'value' => 'average'],
                                        ['title' => 'Высокий уровень (71-100)', 'value' => 'high']
                                   ]"
                                   value="{{ request()->base_tests }}"></x-tables.filter-inputs.select>
@endif

@if(request('type') != 'invite_depth_test')
    <x-tables.filter-inputs.select classes="col-md-4"
                                   name="invited_depth_tests"
                                   id="invited_depth_tests"
                                   label="Приглашен на глубинное тестирование"
                                   :items="[['title' => 'Показать все', 'value' => 'all'], ['title' => 'Приглашен', 'value' => 'invited'], ['title' => 'Не приглашен', 'value' => 'not_invited']]"
                                   value="{{ request()->invited_depth_tests }}"></x-tables.filter-inputs.select>
@endif

@if(request('type') != 'depth_test')
    <x-tables.filter-inputs.select classes="col-md-4"
                                   name="depth_tests"
                                   id="depth_tests"
                                   label="Углубленный тест"
                                   :items="[['title' => 'Показать все', 'value' => 'all'], ['title' => 'Пройден', 'value' => 'finished'], ['title' => 'Проходит', 'value' => 'processed'], ['title' => 'Не пройден', 'value' => 'not_finished']]"
                                   value="{{ request()->depth_tests }}"></x-tables.filter-inputs.select>
@endif

@if(request('type') != 'got_consultation')
    <x-tables.filter-inputs.select classes="col-md-4"
                                   name="child_got_consultation"
                                   id="child_got_consultation"
                                   label="Наставник получил консультацию"
                                   :items="[['title' => 'Показать все', 'value' => 'all'], ['title' => 'Получил', 'value' => 'carried_out'], ['title' => 'Приглашен', 'value' => 'invited'], ['title' => 'Не получил', 'value' => 'not_invited']]"
                                   value="{{ request()->child_got_consultation }}"></x-tables.filter-inputs.select>

    <x-tables.filter-inputs.select classes="col-md-4"
                                   name="got_consultation_with_parent"
                                   id="got_consultation_with_parent"
                                   label="Руководитель получил консультацию"
                                   :items="[['title' => 'Показать все', 'value' => 'all'], ['title' => 'Получил', 'value' => 'carried_out'], ['title' => 'Приглашен', 'value' => 'invited'], ['title' => 'Не получил', 'value' => 'not_invited']]"
                                   value="{{ request()->got_consultation_with_parent }}"></x-tables.filter-inputs.select>
@endif

@if(request('type') != 'target_selection_depth_step')
    <x-tables.filter-inputs.select classes="col-md-4"
                                   name="depth_selection"
                                   id="depth_selection"
                                   label="Отбор по глубинному тесту"
                                   :items="[['title' => 'Показать все', 'value' => 'all'], ['title' => 'Целевой', 'value' => 'target'], ['title' => 'Частично целевой', 'value' => 'partially_target'], ['title' => 'Не целевой', 'value' => 'not_target']]"
                                   value="{{ request()->depth_selection }}"></x-tables.filter-inputs.select>
@endif

<x-tables.filter-inputs.select classes="col-md-4"
                               name="recommend"
                               id="recommend"
                               label="Рекомендован"
                               :items="[['title' => 'Показать все', 'value' => 'all'], ['title' => 'Рекомендован', 'value' => 'recommend'], ['title' => 'Не рекомендован', 'value' => 'not_recommend']]"
                               value="{{ request()->recommend }}"></x-tables.filter-inputs.select>

<x-tables.filter-inputs.select classes="col-md-4"
                               name="agree"
                               id="agree"
                               label="Согласен присвоить статус наставника"
                               :items="[['title' => 'Показать все', 'value' => 'all'], ['title' => 'Согласен', 'value' => 'agree'], ['title' => 'Думает', 'value' => 'think'], ['title' => 'Не согласен', 'value' => 'not_agree']]"
                               value="{{ request()->agree }}"></x-tables.filter-inputs.select>

<input type="text" name="gender" value="{{ request('gender') }}" hidden>
<input type="text" name="age" value="{{ request('age') }}" hidden>
<input type="text" name="trait" value="{{ request('trait') }}" hidden>
<input type="text" name="year" value="{{ request('year') }}" hidden>
<input type="text" name="type" value="{{ request('type') }}" hidden>
