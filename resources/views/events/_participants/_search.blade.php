<x-tables.filter-inputs.input id="q"
                              name="q"
                              classes="col-md-12"
                              icon="la la-search"
                              label="{{ __('Поиск') }}"
                              placeholder="{{ __('Поиск') }}"
                              value="{{ request()->q }}"></x-tables.filter-inputs.input>

<x-tables.filter-inputs.input id="start_at"
                              name="start_at"
                              type="date"
                              classes="col-md-4"
                              label="{{ __('Начиная с') }}"
                              value="{{ request()->start_at }}"></x-tables.filter-inputs.input>

<x-tables.filter-inputs.input id="finish_at"
                              name="finish_at"
                              type="date"
                              classes="col-md-4"
                              label="{{ __('Заканчивая') }}"
                              value="{{ request()->finish_at }}"></x-tables.filter-inputs.input>
