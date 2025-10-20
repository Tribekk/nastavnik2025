<x-tables.filter-inputs.input id="q"
                              name="q"
                              classes="col-md-12"
                              icon="la la-search"
                              label="{{ __('Поиск') }}"
                              placeholder="{{ __('Поиск') }}"
                              value="{{ request()->q }}"></x-tables.filter-inputs.input>


<x-tables.filter-inputs.select2 id="audience_id"
                                name="audience_id[]"
                                classes="col-md-12"
                                event="filterAudienceId"
                                multiple
                                index-url="{{ route('employer.events.audience.view') }}"
                                show-url="/employer/events/audience"
                                label="{{ __('Аудитория') }}"
                                placeholder="{{ __('Аудитория') }}"
                                value="{{ is_array(request()->audience_id) ? implode(',', request()->audience_id) : '' }}"></x-tables.filter-inputs.select2>

<x-tables.filter-inputs.select2 id="direction_id"
                                name="direction_id[]"
                                classes="col-md-12"
                                event="filterDirectionId"
                                multiple
                                index-url="{{ route('employer.events.directions.view') }}"
                                show-url="/employer/events/directions"
                                label="{{ __('Направление') }}"
                                placeholder="{{ __('Направление') }}"
                                value="{{ is_array(request()->direction_id) ? implode(',', request()->direction_id) : '' }}"></x-tables.filter-inputs.select2>

<x-tables.filter-inputs.select id="format_id"
                               name="format_id"
                               classes="col-md-6"
                               label="{{ __('Формат') }}"
                               :items="$formats"
                               value="{{ request()->format_id }}"></x-tables.filter-inputs.select>

<x-tables.filter-inputs.select id="state"
                               name="state"
                               classes="col-md-6"
                               label="{{ __('Статус') }}"
                               :items="$states"
                               value="{{ request()->state }}"></x-tables.filter-inputs.select>

<x-tables.filter-inputs.input id="start_at"
                              name="start_at"
                              type="datetime-local"
                              classes="col-md-4"
                              label="{{ __('Время начала') }}"
                              value="{{ request()->start_at }}"></x-tables.filter-inputs.input>

<x-tables.filter-inputs.input id="finish_at"
                              name="finish_at"
                              type="datetime-local"
                              classes="col-md-4"
                              label="{{ __('Время завершения') }}"
                              value="{{ request()->finish_at }}"></x-tables.filter-inputs.input>
