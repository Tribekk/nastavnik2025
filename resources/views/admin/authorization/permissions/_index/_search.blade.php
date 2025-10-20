<x-tables.filter-inputs.input id="q"
                              name="q"
                              model
                              icon="flaticon2-search-1"
                              classes="col-md-12"
                              label="{{ __('Поиск') }}"
                              placeholder="{{ __('Код, название или описание') }}"
                              value="{{ request()->q }}"></x-tables.filter-inputs.input>
