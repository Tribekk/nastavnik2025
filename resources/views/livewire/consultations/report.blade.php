<div class="px-2">
    <div class="row">
        <div class="col-md-5">
            <div class="form-group">
                <label for="recommend" class="font-size-h6 font-weight-bolder text-dark">Рекомендация</label>
                <div class="radio-inline">
                    <label id="recommend" class="radio font-size-sm-h4 font-size-lg my-2 d-flex align-items-start align-content-start">
                        <input type="radio" id="recommend" name="recommend" value="recommend" wire:model.defer="result.recommend">
                        <span class="mr-4 min-w-20px w-20px h-20px min-h-20px"></span>Рекомендован
                    </label>
                    <label id="recommend" class="radio font-size-sm-h4 font-size-lg my-2 d-flex align-items-start align-content-start">
                        <input type="radio" id="recommend" name="recommend" value="not_recommend" wire:model.defer="result.recommend">
                        <span class="mr-4 min-w-20px w-20px h-20px min-h-20px"></span>Не рекомендован
                    </label>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="form-group">
                <label for="agree" class="font-size-h6 font-weight-bolder text-dark">Согласие</label>
                <div class="radio-inline">
                    <label id="agree" class="radio font-size-sm-h4 font-size-lg my-2 d-flex align-items-start align-content-start">
                        <input type="radio" id="agree" name="agree" value="agree" wire:model.defer="result.agree">
                        <span class="mr-4 min-w-20px w-20px h-20px min-h-20px"></span>Согласны
                    </label>
                    <label id="recommend" class="radio font-size-sm-h4 font-size-lg my-2 d-flex align-items-start align-content-start">
                        <input type="radio" id="agree" name="agree" value="not_agree" wire:model.defer="result.agree">
                        <span class="mr-4 min-w-20px w-20px h-20px min-h-20px"></span>Не согласны
                    </label>
                    <label id="recommend" class="radio font-size-sm-h4 font-size-lg my-2 d-flex align-items-start align-content-start">
                        <input type="radio" id="agree" name="agree" value="think" wire:model.defer="result.agree">
                        <span class="mr-4 min-w-20px w-20px h-20px min-h-20px"></span>Думают
                    </label>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label for="agree" class="font-size-h6 font-weight-bolder text-dark">Оценка</label>
                <div class="d-flex">
                    @forelse($consultation->feedbacks as $feedback)
                        <div class="font-size-sm-h4 font-size-lg my-2 mr-4 d-flex align-items-center">
                            @if($feedback->user_id == $consultation->child_id) Ребенок @else Родитель @endif
                            <i class="mx-2 las la-{{ $feedback->emotion }} @if($feedback->emotion == 'meh') font-blue @endif @if($feedback->emotion == 'frown') text-warning @endif @if($feedback->emotion == 'smile') font-alla @endif" style="font-size: 30px;"></i>
                        </div>
                    @empty
                        <div class="font-size-sm-h4 font-size-lg my-2">Оценку еще не выставили</div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    @if($consultation->review)
        <x-inputs.text-area title="Отзыв {{ $consultation->child_id ==  $consultation->review->user_id ? 'ребенка' : 'родителя'}}" readOnly name="review" id="review" value="{{ $consultation->review->text }}"></x-inputs.text-area>
    @endif

    <div class="separator separator-solid my-7"></div>

    <div class="accordion accordion-light accordion-toggle-arrow" id="accordionTypes" wire:ignore.self>
        @foreach($values as $index => $value)
            <div class="card">
                <div class="card-header">
                    <div class="card-title collapsed font-weight-bold font-size-h4 mb-6" data-toggle="collapse" data-target="#{{ $this->type($value)->code }}" wire:ignore.self>
                        {{ $this->type($value)->title }}
                    </div>
                    <div id="{{ $this->type($value)->code }}" class="collapse" data-parent="#accordionTypes" wire:ignore.self>
                        <div class="card-body">
                            @if($this->type($value)->code != 'results')
                                @include("consultations._report.report_type_{$this->type($value)->code}")

                                <div class="separator separator-solid my-7"></div>
                            @endif

                            <x-inputs.text-area title="Комментарии, соответствие типажу для заказчика"
                                                rows="6"
                                                model="values.{{$index}}.comment"
                                                name="values[{{$index}}][comment]"
                                                id="values.{{$index}}.comment"/>

                            <x-inputs.text-area title="Рекомендации подростку и родителям по итогам консультации"
                                                rows="6"
                                                model="values.{{$index}}.comment_for_result"
                                                name="values[{{$index}}][comment_for_result]"
                                                id="values.{{$index}}.comment_for_result"/>

                            <x-inputs.input-text-v title="Соответствие типажу"
                                                   model="values.{{$index}}.conformity_type"
                                                   name="values[{{$index}}][conformity_type]"
                                                   id="values.{{$index}}.conformity_type"/>

                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="button-group mt-12">
        <button class="btn btn-success font-weight-bold font-size-h6" wire:click.prevent="save">
            <i class="la la-save"></i>
            Сохранить
        </button>
    </div>
</div>
