<livewire:filters.school-and-class classes="row no-gutters col-md-6 col-lg-5 my-3"
                                   schoolClasses="col-md-6 mt-6 mt-md-0 pr-md-4 pr-0"
                                   classClasses="col-md-6 mt-6 mt-md-0 pl-md-4 pl-0"/>

<x-tables.filter-inputs.select id="group"
                              name="group"
                              classes="col-md-3"
                              label="{{ __('Тип тестирования') }}"
                              :items="[['title' => 'Базовое', 'value' => 'base'], ['title' => 'Глубинное', 'value' => 'depth']]"
                              value="{{ request()->group }}"></x-tables.filter-inputs.select>

