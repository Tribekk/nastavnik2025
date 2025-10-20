<x-tables.filter-inputs.input id="title"
                              name="title"
                              classes="col-md-3"
                              label="{{ __('Название') }}"
                              placeholder="{{ __('Название') }}"
                              value="{{ request()->title }}"></x-tables.filter-inputs.input>

<x-tables.filter-inputs.input id="short_title"
                              name="short_title"
                              classes="col-md-3"
                              label="{{ __('Сокращенное название') }}"
                              placeholder="{{ __('Сокращенное название') }}"
                              value="{{ request()->short_title }}"></x-tables.filter-inputs.input>

<x-tables.filter-inputs.input id="address"
                              name="address"
                              classes="col-md-3"
                              icon="la la-map-marker"
                              label="{{ __('Адрес') }}"
                              placeholder="{{ __('Адрес') }}"
                              value="{{ request()->address }}"></x-tables.filter-inputs.input>
