<div class="tab-pane show active px-7" id="consultation-tab" role="tabpanel">
    <form action="{{ route('consultations.update', $consultation) }}" method="post">
        @csrf
        <div class="row">
            <div class="col-lg-5 col-md-7">
                <label class="font-weight-bold font-size-h3 mb-8">Информация</label>

                <div class="d-flex flex-wrap flex-md-nowrap align-items-center justify-content-between mb-3 font-size-h5">
                    <span class="font-weight-bold mr-2">Родитель:</span>
                    <span class="text-muted text-right">{{ optional($consultation->parent)->fullName ?? 'не указан' }}</span>
                </div>
                <div class="d-flex flex-wrap flex-md-nowrap align-items-center justify-content-between mb-3 font-size-h5">
                    <span class="font-weight-bold mr-2">Ребенок:</span>
                    <span class="text-muted text-right">{{ $consultation->child->fullName }}
                        @if($consultation->child->fullYears)
                            ({{ $consultation->child->fullYearsFormatted }})
                        @endif
                    </span>
                </div>
                <div class="d-flex align-items-center justify-content-between mb-3 font-size-h5">
                    <span class="font-weight-bold mr-2">Дата:</span>
                    <span class="text-muted text-right">{{ $consultation->appointment->dateFormatted }}</span>
                </div>
                <div class="d-flex align-items-center justify-content-between mb-3 font-size-h5">
                    <span class="font-weight-bold mr-2">Время начала:</span>
                    <span class="text-muted text-right">{{ $consultation->appointment->startFormatted }}</span>
                </div>
                <div class="d-flex align-items-center justify-content-between mb-3 font-size-h5">
                    <span class="font-weight-bold mr-2">Время завершения:</span>
                    <span class="text-muted text-right">{{ $consultation->appointment->finishFormatted }}</span>
                </div>
            </div>
            <div class="col-lg-5 col-md-5">
                <div class="form-group mb-8 pl-md-8">
                    <label class="font-weight-bold font-size-h3 mb-8">Формат консультации</label>

                    <div class="checkbox-list">
                        <label class="checkbox font-size-sm-h4 font-size-lg d-flex align-items-start align-content-start">
                            <input type="checkbox" @if($consultation->state->code() == 'not-verified') disabled @endif @if(old('with_child', $consultation->with_child)) checked @endif value="1" name="with_child"/>
                            <span class="mr-4 min-w-20px w-20px h-20px min-h-20px"></span>
                            Всю встречу провести с ребенком – не разделять на индивидуальные беседы
                        </label>
                        <label class="checkbox font-size-sm-h4 font-size-lg d-flex align-items-start align-content-start">
                            <input type="checkbox" @if($consultation->state->code() == 'not-verified') disabled @endif @if(old('personal_communication_parent', $consultation->personal_communication_parent)) checked @endif value="1" name="personal_communication_parent"/>
                            <span class="mr-4 min-w-20px w-20px h-20px min-h-20px"></span>
                            Выделить из консультации 15-30 минут на личное общение с профориентологом
                        </label>
                        <label class="checkbox font-size-sm-h4 font-size-lg d-flex align-items-start align-content-start">
                            <input type="checkbox" @if($consultation->state->code() == 'not-verified') disabled @endif @if($consultation->state->code() == 'not-verified') disabled @endif @if(old('personal_communication_child', $consultation->personal_communication_child)) checked @endif value="1" name="personal_communication_child"/>
                            <span class="mr-4 min-w-20px w-20px h-20px min-h-20px"></span>
                            Дать возможность личного общения ребенку с профориентологом – 30 минут
                        </label>
                        <label class="checkbox font-size-sm-h4 font-size-lg d-flex align-items-start align-content-start">
                            <input type="checkbox" @if($consultation->state->code() == 'not-verified') disabled @endif @if(old('separation_during_consultation', $consultation->separation_during_consultation)) checked @endif value="1" name="separation_during_consultation"/>
                            <span class="mr-4 min-w-20px w-20px h-20px min-h-20px"></span>
                            Определить необходимость любого разделения во время консультации
                        </label>
                    </div>
                </div>
            </div>
        </div>

        @if($consultation->wishes_and_questions)
            <x-inputs.text-area title="Пожелания или вопросы"
                                @if($consultation->state->code() == 'not-verified') disabled @endif
                                value="{{ old('wishes_and_questions', $consultation->wishes_and_questions) }}"
                                name="wishes_and_questions" id="wishes_and_questions"/>
        @endif

        @if($consultation->state->code() != 'not-verified')
            <x-inputs.input-text-v name="communication_type_value" id="communication_type_value" value="{{ old('communication_type_value', $consultation->communication_type_value) }}" title="Ссылка на онлайн-конференцию" placeholder="Введите ссылку на онлайн-конференцию"/>


            <div class="form-group mb-8">
                <label class="font-weight-bold font-size-h5">Какой способ связи предпочитаете - где удобнее получить консультацию?</label>

                <div class="radio-list">
                    <label class="radio font-size-sm-h4 font-size-lg d-flex align-items-start align-content-start">
                        <input type="radio" @if($consultation->communication_type == 'zoom') checked @endif value="zoom" name="communication_type"/>
                        <span class="mr-4 min-w-20px w-20px h-20px min-h-20px"></span>
                        Zoom (можно без установки приложения, через браузер)
                    </label>
                    <label class="radio font-size-sm-h4 font-size-lg d-flex align-items-start align-content-start">
                        <input type="radio" @if($consultation->communication_type == 'whatsapp') checked @endif value="whatsapp" name="communication_type"/>
                        <span class="mr-4 min-w-20px w-20px h-20px min-h-20px"></span>
                        WhatsApp
                    </label>
                    <label class="radio font-size-sm-h4 font-size-lg d-flex align-items-start align-content-start">
                        <input type="radio" @if($consultation->communication_type == 'skype') checked @endif value="skype" name="communication_type"/>
                        <span class="mr-4 min-w-20px w-20px h-20px min-h-20px"></span>
                        Skype
                    </label>
                    <label class="radio font-size-sm-h4 font-size-lg d-flex align-items-start align-content-start">
                        <input type="radio" @if($consultation->communication_type == 'irrelevant') checked @endif value="irrelevant" name="communication_type"/>
                        <span class="mr-4 min-w-20px w-20px h-20px min-h-20px"></span>
                        Не имеет значения
                    </label>
                </div>
            </div>

            <x-inputs.select title="Выберите статус консультации" name="state" id="state" current-value="{{ old('state', $consultation->state->code()) }}" :values="$states" required></x-inputs.select>

            <div class="button-group mt-8">
                <button class="btn btn-success font-weight-bolder font-size-h6 px-4 py-2 my-1 mr-1">
                    <i class="la la-save"></i>Сохранить
                </button>
                <a href="{{ route('consultations.list') }}" class="btn btn-outline-success font-weight-bolder font-size-h6 px-4 py-2 my-1 mr-1">К списку консультаций</a>
            </div>
        @endif
    </form>
</div>
