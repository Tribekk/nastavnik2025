<x-tables.filter-inputs.input id="q"
                              name="q"
                              classes="col-md-12"
                              icon="la la-search"
                              label="{{ __('Поиск') }}"
                              placeholder="{{ __('Поиск') }}"
                              value="{{ request()->q }}"></x-tables.filter-inputs.input>

<x-tables.filter-inputs.select id="format_id"
                               name="format_id"
                               classes="col-md-4"
                               label="{{ __('Формат') }}"
                               :items="$formats"
                               value="{{ request()->format_id }}"></x-tables.filter-inputs.select>

<x-tables.filter-inputs.select id="event_state"
                               name="event_state"
                               classes="col-md-4"
                               label="{{ __('Статус мероприятия') }}"
                               :items="$eventStates"
                               value="{{ request()->event_state }}"></x-tables.filter-inputs.select>

<x-tables.filter-inputs.select id="state"
                               name="state"
                               classes="col-md-4"
                               label="{{ __('Статус приглашения') }}"
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
