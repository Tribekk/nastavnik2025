<x-tables.filter-inputs.input id="title"
                              name="title"
                              classes="col-md-4"
                              label="{{ __('Название') }}"
                              placeholder="{{ __('Название') }}"
                              value="{{ request()->title }}"></x-tables.filter-inputs.input>

<x-tables.filter-inputs.input id="short_title"
                              name="short_title"
                              classes="col-md-4"
                              label="{{ __('Сокращенное название') }}"
                              placeholder="{{ __('Сокращенное название') }}"
                              value="{{ request()->short_title }}"></x-tables.filter-inputs.input>
