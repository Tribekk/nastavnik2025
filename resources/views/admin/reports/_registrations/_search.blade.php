<x-tables.filter-inputs.select2 id="role_id"
                                name="role_id"
                                classes="col-md-4 col-lg-3"
                                label="{{ __('Роль') }}"
                                placeholder="{{ __('Роль пользователя') }}"
                                event="filterByRole"
                                indexUrl="{{ route('admin.roles.view') }}"
                                showUrl="/admin/authorization/roles"
                                value="{{ request()->role_id }}"></x-tables.filter-inputs.select2>

<x-tables.filter-inputs.input id="start_at"
                              name="start_at"
                              type="date"
                              classes="col-md-4 col-lg-3"
                              label="{{ __('Начиная с') }}"
                              value="{{ request()->start_at }}"></x-tables.filter-inputs.input>

<x-tables.filter-inputs.input id="end_at"
                              name="end_at"
                              type="date"
                              classes="col-md-4 col-lg-3"
                              label="{{ __('Заканчивая') }}"
                              value="{{ request()->end_at }}"></x-tables.filter-inputs.input>
