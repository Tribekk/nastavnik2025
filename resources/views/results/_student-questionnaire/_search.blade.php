<x-tables.filter-inputs.input classes="col-md-4"
                              name="last_name"
                              id="last_name"
                              label="{{ __('Фамилия') }}"
                              placeholder="{{ __('Фамилия') }}"
                              value="{{ request()->last_name }}"></x-tables.filter-inputs.input>

<x-tables.filter-inputs.input classes="col-md-4"
                              name="first_name"
                              id="first_name"
                              label="{{ __('Имя') }}"
                              placeholder="{{ __('Имя') }}"
                              value="{{ request()->first_name }}"></x-tables.filter-inputs.input>

<x-tables.filter-inputs.input classes="col-md-4"
                              name="middle_name"
                              id="middle_name"
                              label="{{ __('Отчество') }}"
                              placeholder="{{ __('Отчество') }}"
                              value="{{ request()->middle_name }}"></x-tables.filter-inputs.input>

<livewire:filters.school-and-class classes="row no-gutters col-md-6 my-3"
                                   schoolClasses="col-md-6 mt-md-0 pr-md-4 pr-0"
                                   classClasses="col-md-6 mt-6 mt-md-0 pl-md-4 pl-0"/>

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
