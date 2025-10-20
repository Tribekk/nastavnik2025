@extends ('layout.page')

@section('subheader')
    <x-subheader title="Управление мероприятиями"/>
@endsection

@section ('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card card-custom">
                    <div class="card-header">
                        <div class="card-title font-weight-bold font-size-h3 font-hero-super">
                            {{ $event->title }}
                        </div>
                        <div class="card-toolbar">
                            <form action="{{ route('employer.events.destroy', $event) }}" method="post">
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
                                <form action="{{ route('employer.events.update', $event) }}" enctype="multipart/form-data" method="post">
                                    @csrf
                                    @method('PATCH')

                                    @error('error')
                                        <x-alert type="danger" text="{{ $message }}" :close="false"></x-alert>
                                    @enderror

                                    <x-inputs.input-text-v id="title" name="title" :required="true" title="Полное название" value="{{ old('title', $event->title) }}"/>

                                    <x-inputs.select2 id="direction_id" name="direction_id[]"
                                                      required title="Направление"
                                                      placeholder="Направление" event="setDirectionId"
                                                      multiple
                                                      value="{{ is_array(old('direction_id', $event->directionIdsArr)) ? implode(',', old('direction_id', $event->directionIdsArr)) : '' }}"
                                                      url="{{ route('employer.events.directions.view') }}"
                                                      selected-url="/employer/events/directions"
                                    />

                                    <x-inputs.select2 id="format_id" name="format_id"
                                                      required title="Формат проведения"
                                                      placeholder="Формат проведения" event="setFormatId"
                                                      value="{{ old('format_id', $event->format_id) }}"
                                                      url="{{ route('employer.events.formats.view') }}"
                                                      selected-url="/employer/events/formats"
                                    />

                                    <x-inputs.select2 id="audience_id" name="audience_id[]"
                                                      required title="Аудитория"
                                                      multiple
                                                      placeholder="Аудитория" event="setAudienceId"
                                                      value="{{ is_array(old('audience_id', $event->audienceIdsArr)) ? implode(',', old('audience_id', $event->audienceIdsArr)) : '' }}"
                                                      url="{{ route('employer.events.audience.view') }}"
                                                      selected-url="/employer/events/audience"
                                    />

                                    <x-inputs.input-text-v id="location" name="location" title="Место проведения" value="{{ old('location', $event->location) }}"/>
                                    <x-inputs.input-text-v id="start_at" name="start_at" type="datetime-local" date-time-picker :required="true" value="{{ old('start_at', $event->start_at->format('Y-m-d\TH:i')) }}" title="Время начала"/>
                                    <x-inputs.input-text-v id="finish_at" name="finish_at" type="datetime-local" date-time-picker :required="true" value="{{ old('finish_at', $event->finish_at->format('Y-m-d\TH:i')) }}" title="Время завершения"/>

                                    <x-inputs.summernote-editor id="program" name="program" title="Программа" value="{{ old('program', $event->program) }}"></x-inputs.summernote-editor>

                                    <livewire:event.attached-files :event="$event"></livewire:event.attached-files>

                                    <x-inputs.select id="state" name="state" title="Статус" current-value="{{ old('state', $event->state->code()) }}" required :values="$states"/>

                                    <div class="d-flex">
                                        <x-inputs.submit title="Обновить"/>
                                        <x-inputs.button-link type="btn-outline-success" link="{{ route('employer.events.participants', $event) }}" title="{{ __('К списку участников') }}"/>
                                        <x-inputs.button-link type="btn-outline-success" link="{{ route('employer.events.view') }}" title="{{ __('К списку мероприятий') }}"/>
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

