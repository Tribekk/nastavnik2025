<x-tables.filter-inputs.input id="q"
                              name="q"
                              type="date"
                              classes="col-md-3"
                              label="{{ __('Поиск') }}"
                              placeholder="{{ __('Поиск по ФИО наставника') }}"
                              value="{{ request()->q }}"></x-tables.filter-inputs.input>

<livewire:filters.school-and-class classes="row no-gutters col-md-6 col-lg-5 my-3"
                                   schoolClasses="col-md-6 mt-6 mt-md-0 pr-md-4 pr-0"
                                   classClasses="col-md-6 mt-6 mt-md-0 pl-md-4 pl-0"/>
