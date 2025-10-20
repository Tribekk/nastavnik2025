<livewire:filters.school-and-class classes="row no-gutters col-md-6 col-lg-5 my-3"
                                   schoolClasses="col-md-6 mt-6 mt-md-0 pr-md-4 pr-0"
                                   classClasses="col-md-6 mt-6 mt-md-0 pl-md-4 pl-0"/>

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
