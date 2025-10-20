@extends ('layout.page')

@section('subheader')
    <x-subheader title="Управление списком организаций"/>
@endsection

@section ('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card card-custom">
                    <div class="card-header">
                        <div class="card-title font-weight-bold font-size-h3 font-hero-super">
                            Новая дочерняя организация
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <form action="{{ route('orgunits.store') }}" enctype="multipart/form-data" method="post">
                                    @csrf

                                    <x-inputs.image id="logo" name="logo" title="Логотип"/>

                                    <x-inputs.input-text-v id="title" name="title" :required="true" title="Полное название"/>

                                    <x-inputs.input-text-v id="short_title" name="short_title" title="Сокращенное название"/>

                                    <x-inputs.select2 id="legal_form_id" name="legal_form_id"
                                                      required
                                                      url="{{ route('orgunits.legal_forms.view') }}"
                                                      selectedUrl="/orgunits/legal_forms"
                                                      title="Организационно-правовая форма"
                                                      placeholder="Выбор организационно-правовой формы"/>

                                    <input type="text" name="parent_id" id="parent_id" value="{{ $parentId }}" hidden>

                                    <x-inputs.select2 id="activity_kind_id" name="activity_kind_id[]"
                                                      required title="Направление деятельности"
                                                      placeholder="Выбор направления деятельности" event="setActivityKindId"
                                                      multiple
                                                      value="{{ is_array(old('activity_kind_id')) ? implode(',', old('activity_kind_id')) : '' }}"
                                                      url="{{ route('orgunits.activity_kinds.view') }}"
                                                      selected-url="/orgunits/activity_kinds"
                                    />

                                    <x-inputs.address id="legal_address" name="legal_address" title="Юридический адрес"/>

                                    <x-inputs.address id="fact_address" name="fact_address" title="Фактический адрес"/>

                                    <x-inputs.submit title="Добавить"/>

                                    <x-inputs.button-link type="btn-outline-success" link="{{ route('orgunits.view') }}" title="{{ __('К списку организаций') }}"/>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
