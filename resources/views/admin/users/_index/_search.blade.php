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

<x-tables.filter-inputs.select2 classes="col-md-4"
                                name="role_id"
                                id="role_id"
                                label="{{ __('Роль') }}"
                                placeholder="{{ __('Роль') }}"
                                event="filterByRole"
                                indexUrl="{{ route('admin.roles.view') }}"
                                showUrl="/admin/authorization/roles"
                                value="{{ request()->role_id }}"></x-tables.filter-inputs.select2>


<livewire:filters.school-and-class classes="row no-gutters col-md-8 my-3"
                                   schoolClasses="col-md-6 mt-md-0 pr-md-4 pr-0"
                                   classClasses="col-md-6 mt-6 mt-md-0 pl-md-4 pl-0"/>


<x-tables.filter-inputs.input id="created_at_start"
                              name="created_at_start"
                              type="date"
                              classes="col-md-4"
                              label="{{ __('Начиная с') }}"
                              value="{{ request()->created_at_start }}"></x-tables.filter-inputs.input>

<x-tables.filter-inputs.input id="created_at_end"
                              name="created_at_end"
                              type="date"
                              classes="col-md-4"
                              label="{{ __('Заканчивая') }}"
                              value="{{ request()->created_at_end }}"></x-tables.filter-inputs.input>

<x-tables.filter-inputs.switch-input id="is_admin"
                                     name="is_admin"
                                     label="{{ __('Администратор') }}"
                                     classes="col-md-4"
                                     value="{{ request()->is_admin }}"></x-tables.filter-inputs.switch-input>
