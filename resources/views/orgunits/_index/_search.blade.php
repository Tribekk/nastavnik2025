<x-tables.filter-inputs.input id="q"
                              name="q"
                              classes="col-md-4"
                              label="{{ __('Название') }}"
                              placeholder="{{ __('Название') }}"
                              value="{{ request()->q }}"></x-tables.filter-inputs.input>

<x-tables.filter-inputs.select2 classes="col-md-4"
                                name="parent_id"
                                id="parent_id"
                                label="{{ __('Родительская организация') }}"
                                placeholder="{{ __('Родительская организация') }}"
                                event="filterByParent"
                                indexUrl="{{ route('orgunits.children', Auth::user()->orgunit_id) }}"
                                showUrl="/orgunits"
                                value="{{ request()->parent_id }}"></x-tables.filter-inputs.select2>

<x-tables.filter-inputs.select2 classes="col-md-4"
                                name="legal_form_id"
                                id="legal_form_id"
                                label="{{ __('Организационно-правовая форма') }}"
                                placeholder="{{ __('Организационно-правовая форма') }}"
                                event="filterLegalForm"
                                indexUrl="{{ route('orgunits.legal_forms.view') }}"
                                showUrl="/orgunits/legal_forms"
                                value="{{ request()->legal_form_id }}"></x-tables.filter-inputs.select2>

<x-tables.filter-inputs.select2 classes="col-md-4"
                                name="activity_kind_id"
                                id="activity_kind_id"
                                label="{{ __('Вид деятельности') }}"
                                placeholder="{{ __('Вид деятельности') }}"
                                event="filterActivityKind"
                                indexUrl="{{ route('orgunits.activity_kinds.view') }}"
                                showUrl="/orgunits/activity_kinds"
                                value="{{ request()->activity_kind_id }}"></x-tables.filter-inputs.select2>
