<x-tables.filter-inputs.input classes="col-md-3"
                              name="last_name"
                              id="last_name"
                              label="{{ __('Фамилия') }}"
                              placeholder="{{ __('Фамилия') }}"
                              value="{{ request()->last_name }}"></x-tables.filter-inputs.input>

<x-tables.filter-inputs.input classes="col-md-3"
                              name="first_name"
                              id="first_name"
                              label="{{ __('Имя') }}"
                              placeholder="{{ __('Имя') }}"
                              value="{{ request()->first_name }}"></x-tables.filter-inputs.input>

<x-tables.filter-inputs.input classes="col-md-3"
                              name="middle_name"
                              id="middle_name"
                              label="{{ __('Отчество') }}"
                              placeholder="{{ __('Отчество') }}"
                              value="{{ request()->middle_name }}"></x-tables.filter-inputs.input>

<x-tables.filter-inputs.select2 classes="col-md-3"
                                name="school_id"
                                id="school_id"
                                label="{{ __('Компания') }}"
                                placeholder="{{ __('Компания') }}"
                                event="filterByRole"
                                indexUrl="{{ route('admin.schools.view') }}"
                                showUrl="/admin/schools"
                                value="{{ request()->school_id }}"></x-tables.filter-inputs.select2>

<x-tables.filter-inputs.select id="observed"
                               name="observed"
                               classes="col-md-3"
                               label="{{ __('Ребенок привязан') }}"
                               :items="[['title' => 'Показать все', 'value' => 'all'], ['title' => 'Да', 'value' => 'yes'], ['title' => 'Нет', 'value' => 'no']]"
                               value="{{ request()->observed }}"></x-tables.filter-inputs.select>

<x-tables.filter-inputs.select id="questionnaire_type"
                               name="questionnaire_type"
                               classes="col-md-3"
                               label="{{ __('Анкеты') }}"
                               :items="[['title' => 'Показать все', 'value' => 'all'], ['title' => 'Завершенные', 'value' => 'finished'], ['title' => 'Не завершенные', 'value' => 'not_finished']]"
                               value="{{ request()->questionnaire_type }}"></x-tables.filter-inputs.select>

<x-tables.filter-inputs.input id="finished_at_start"
                              name="finished_at_start"
                              type="date"
                              classes="col-md-3"
                              label="{{ __('Начиная с') }}"
                              value="{{ request()->finished_at_start }}"></x-tables.filter-inputs.input>

<x-tables.filter-inputs.input id="finished_at_end"
                              name="finished_at_end"
                              type="date"
                              classes="col-md-3"
                              label="{{ __('Заканчивая') }}"
                              value="{{ request()->finished_at_end }}"></x-tables.filter-inputs.input>
