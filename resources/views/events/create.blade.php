@extends ('layout.page')

@section('subheader')
    <x-subheader title="Управление списком мероприятий"/>
@endsection

@section ('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card card-custom">
                    <div class="card-header">
                        <div class="card-title font-weight-bold font-size-h3 font-hero-super">
                            Новое мероприятие
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <form action="{{ route('employer.events.store') }}" method="post">
                                    @csrf

                                    <x-inputs.input-text-v id="title" name="title" :required="true" title="Полное название"/>

                                    <x-inputs.select2 id="direction_id" name="direction_id[]"
                                                      required title="Направление"
                                                      multiple
                                                      placeholder="Направление" event="setDirectionId"
                                                      value="{{ is_array(old('direction_id')) ? implode(',', old('direction_id')) : '' }}"
                                                      url="{{ route('employer.events.directions.view') }}"
                                                      selected-url="/employer/events/directions"
                                    />

                                    <x-inputs.select2 id="format_id" name="format_id"
                                                      required title="Формат проведения"
                                                      placeholder="Формат проведения" event="setFormatId"
                                                      value="{{ old('format_id') ?? '' }}"
                                                      url="{{ route('employer.events.formats.view') }}"
                                                      selected-url="/employer/events/formats"
                                    />

                                    <x-inputs.select2 id="audience_id" name="audience_id[]"
                                                      required title="Аудитория"
                                                      multiple
                                                      placeholder="Аудитория" event="setAudienceId"
                                                      value="{{ is_array(old('audience_id')) ? implode(',', old('audience_id')) : '' }}"
                                                      url="{{ route('employer.events.audience.view') }}"
                                                      selected-url="/employer/events/audience"
                                    />

                                    <x-inputs.input-text-v id="location" name="location" title="Место проведения"/>
                                    <x-inputs.input-text-v id="start_at" name="start_at" type="datetime-local" date-time-picker :required="true" title="Время начала"/>
                                    <x-inputs.input-text-v id="finish_at" name="finish_at" type="datetime-local" date-time-picker :required="true" title="Время завершения"/>

                                    <x-inputs.submit title="Добавить"/>

                                    <x-inputs.button-link type="btn-outline-success" link="{{ route('employer.events.view') }}" title="{{ __('К списку мероприятий') }}"/>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
