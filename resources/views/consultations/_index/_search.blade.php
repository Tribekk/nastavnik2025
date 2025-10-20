<x-tables.filter-inputs.input id="q"
                              name="q"
                              classes="col-md-5"
                              icon="flaticon2-search-1"
                              label="{{ __('Поиск') }}"
                              placeholder="{{ __('Поиск') }}"
                              value="{{ request()->title }}"></x-tables.filter-inputs.input>

<x-tables.filter-inputs.input type="date"
                              id="date_at"
                              name="date_at"
                              classes="col-md-3"
                              label="{{ __('Дата') }}"
                              placeholder="{{ __('Дата') }}"
                              value="{{ request()->date_at }}"></x-tables.filter-inputs.input>

