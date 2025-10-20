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
                            {{ $orgunit->title }}
                        </div>
                        <div class="card-toolbar">
                            <form action="{{ route('admin.orgunits.destroy', $orgunit) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button
                                    type="submit"
                                    class="btn btn-danger px-4 py-2 my-1 mr-1"
                                    onclick="return confirm('Вы действительно хотите удалить запись?')"
                                >
                                    Удалить
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <form action="{{ route('admin.orgunits.update', $orgunit) }}" enctype="multipart/form-data" method="post">
                                    @csrf
                                    @method('PATCH')

                                    @error('destroy')
                                        <x-alert type="danger" text="{{$message}}"/>
                                    @enderror

                                    <x-inputs.image id="logo" name="logo" placeholder="{{ $orgunit->logoUrl }}" destroyAction="{{ $orgunit->logo ? route('admin.orgunits.logo.destroy', $orgunit) : null }}" title="Логотип"/>

                                    <x-inputs.input-text-v id="title" name="title" :required="true" title="Полное название" value="{{ old('title', $orgunit->title) }}"/>

                                    <x-inputs.input-text-v id="short_title" name="short_title" title="Сокращенное название" value="{{ old('title', $orgunit->short_title) }}"/>

                                    <x-inputs.select2 id="legal_form_id" name="legal_form_id"
                                                      required
                                                      url="{{ route('admin.orgunits.legal_forms.view') }}"
                                                      selectedUrl="/admin/orgunits/legal_forms"
                                                      value="{{ old('legal_form_id', $orgunit->legal_form_id) ?? '' }}"
                                                      title="Организационно-правовая форма"
                                                      placeholder="Выбор организационно-правовой формы"/>

                                    <x-inputs.select2 id="activity_kind_id" name="activity_kind_id[]"
                                                      required title="Направление деятельности"
                                                      placeholder="Выбор направления деятельности" event="setActivityKindId"
                                                      multiple
                                                      value="{{ is_array(old('activity_kind_id', $orgunit->activityKindIdsArr)) ? implode(',', old('activity_kind_id', $orgunit->activityKindIdsArr)) : '' }}"
                                                      url="{{ route('admin.orgunits.activity_kinds.view') }}"
                                                      selected-url="/admin/orgunits/activity_kinds"
                                    />

                                    <x-inputs.address id="legal_address"
                                                      name="legal_address"
                                                      region="{{ optional($orgunit->legal_address)->region }}"
                                                      city="{{ optional($orgunit->legal_address)->city }}"
                                                      street="{{ optional($orgunit->legal_address)->street }}"
                                                      house="{{ optional($orgunit->legal_address)->house }}"
                                                      title="Юридический адрес"/>

                                    <x-inputs.address id="fact_address"
                                                      name="fact_address"
                                                      region="{{ optional($orgunit->fact_address)->region }}"
                                                      city="{{ optional($orgunit->fact_address)->city }}"
                                                      street="{{ optional($orgunit->fact_address)->street }}"
                                                      house="{{ optional($orgunit->fact_address)->house }}"
                                                      title="Фактический адрес"/>

                                    <div class="d-flex">
                                        <x-inputs.submit title="Обновить"/>
                                        <x-inputs.button-link type="btn-success" link="{{ route('admin.orgunits.create', ['parent_id' => $orgunit->id]) }}" title="{{ __('Добавить дочернюю') }}"/>
                                        <x-inputs.button-link type="btn-outline-success" link="{{ route('orgunits.description', $orgunit) }}" title="{{ __('Просмотр лендинга') }}"/>
                                        <x-inputs.button-link type="btn-outline-success" link="{{ route('admin.orgunits.view') }}" title="{{ __('К списку организаций') }}"/>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

