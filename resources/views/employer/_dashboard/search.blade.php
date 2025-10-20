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

<x-tables.filter-inputs.select classes="col-md-4"
                               name="year"
                               id="year"
                               placeholder="Год оценки"
                               label="Год оценки"
                               :items="$years"
                               value="{{ request()->year }}"></x-tables.filter-inputs.select>

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
                               name="gender"
                               id="gender"
                               placeholder="Пол"
                               label="Пол"
                               :items="[['title' => 'Показать все', 'value' => 'all'], ['title' => 'Мужской', 'value' => 'men'], ['title' => 'Женский', 'value' => 'women']]"
                               value="{{ request()->gender }}"></x-tables.filter-inputs.select>

<x-tables.filter-inputs.select classes="col-md-4"
                               name="age"
                               id="age"
                               placeholder="Возраст"
                               label="Возраст"
                               :items="$studentsAge"
                               value="{{ request()->age }}"></x-tables.filter-inputs.select>

{{--<x-tables.filter-inputs.select classes="col-md-4"--}}
{{--                               name="person_type"--}}
{{--                               id="person_type"--}}
{{--                               placeholder="Типаж"--}}
{{--                               label="Типаж"--}}
{{--                               :items="$personTypes"--}}
{{--                               value="{{ request()->person_type }}"></x-tables.filter-inputs.select>--}}
