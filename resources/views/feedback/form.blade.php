@extends('layout.base')

@section('subheader')
    <x-subheader title="Профтрекер" class="font-pixel text-uppercase text-center text-white" ></x-subheader>
@endsection

@section('content')

    <div class="container">
        <div class="card">
            <div class="card-body">
                <h3 class="font-size-h2 font-weight-bold text-primary">Обратная связь</h3>
                <h3 class="font-size-h3 text-primary">Пожалуйста, дайте Вашу оценку по этапам реализации проекта</h3>

                <form action="{{ route('feedback.store') }}" method="post" class="mt-10">
                    @csrf

                    <x-inputs.input-text-v id="events_attached_earlier" name="events_attached_earlier" title="1. В каких мероприятиях для наставников вы участвовали ранее?" placeholder="Напишите"></x-inputs.input-text-v>

                    <div class="form-group">
                        <label class="font-size-h6 font-weight-bolder text-dark">2. Оцените эффективность Профтрекера в сравнении с прошлыми проектами?</label>
                        <div class="">
                            <label class="radio font-size-h6 my-2 d-flex align-items-start align-content-start">
                                <input type="radio" id="effective1" name="effective" value="1" @if(old('effective') === '1') checked @endif>
                                <span class="mr-4 min-w-20px w-20px h-20px min-h-20px"></span> прошлые более эффективны
                            </label>
                            <label class="radio font-size-h6 my-2 d-flex align-items-start align-content-start">
                                <input type="radio" id="effective2" name="effective" value="2" @if(old('effective') === '2') checked @endif>
                                <span class="mr-4 min-w-20px w-20px h-20px min-h-20px"></span> примерно одинаково
                            </label>
                            <label class="radio font-size-h6 my-2 d-flex align-items-start align-content-start">
                                <input type="radio" id="effective3" name="effective" value="3" @if(old('effective') === '3') checked @endif>
                                <span class="mr-4 min-w-20px w-20px h-20px min-h-20px"></span> Профтрекер понравился больше
                            </label>
                            <label class="radio font-size-h6 my-2 d-flex align-items-start align-content-start">
                                <input type="radio" id="effective4" name="effective" value="4" @if(old('effective') === '4') checked @endif>
                                <span class="mr-4 min-w-20px w-20px h-20px min-h-20px"></span> пока затрудняюсь ответить
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="font-size-h6 font-weight-bolder text-dark">3. Как вы бы охарактеризовали проект Профтрекер</label>
                        @include('feedback._slider-input', ['leftLabel' => 'непонятный', 'rightLabel' => 'понятный', 'sliderId' => 'intelligibility', 'sliderName' => 'intelligibility', 'sliderClass' => 'progress-alla', 'value' => old('intelligibility', 5)])
                        @include('feedback._slider-input', ['leftLabel' => 'скучный', 'rightLabel' => 'интересный', 'sliderId' => 'interesting', 'sliderName' => 'interesting', 'sliderClass' => 'progress-warning', 'value' => old('interesting', 5)])
                        @include('feedback._slider-input', ['leftLabel' => 'непроработанный', 'rightLabel' => 'качественный', 'sliderId' => 'elaboration', 'sliderName' => 'elaboration', 'sliderClass' => 'progress-blue', 'value' => old('elaboration', 5)])
                        @include('feedback._slider-input', ['leftLabel' => 'неинформативный', 'rightLabel' => 'полезный', 'sliderId' => 'utility', 'sliderName' => 'utility', 'sliderClass' => 'progress-alla', 'value' => old('utility', 5)])

                        <div class="mt-4">
                            <x-inputs.input-text-v id="project_definition" name="project_definition" title="Ваше определение проекта"></x-inputs.input-text-v>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="font-size-h6 font-weight-bolder text-dark required">4. Какую оценку поставите проекту в целом</label>
                        <div class="radio-inline flex-wrap">
                            <label class="radio font-size-h6 my-2 d-flex align-items-start align-content-start">
                                <input type="radio" id="mark1" name="mark" value="1" @if(old('mark') === '1') checked @endif>
                                <span class="mr-4 min-w-20px w-20px h-20px min-h-20px"></span> 1
                            </label>
                            <label class="radio font-size-h6 my-2 d-flex align-items-start align-content-start">
                                <input type="radio" id="mark2" name="mark" value="2" @if(old('mark') === '2') checked @endif>
                                <span class="mr-4 min-w-20px w-20px h-20px min-h-20px"></span> 2
                            </label>
                            <label class="radio font-size-h6 my-2 d-flex align-items-start align-content-start">
                                <input type="radio" id="mark3" name="mark" value="3" @if(old('mark') === '3') checked @endif>
                                <span class="mr-4 min-w-20px w-20px h-20px min-h-20px"></span> 3
                            </label>
                            <label class="radio font-size-h6 my-2 d-flex align-items-start align-content-start">
                                <input type="radio" id="mark4" name="mark" value="4" @if(old('mark') === '4') checked @endif>
                                <span class="mr-4 min-w-20px w-20px h-20px min-h-20px"></span> 4
                            </label>
                            <label class="radio font-size-h6 my-2 d-flex align-items-start align-content-start">
                                <input type="radio" id="mark5" name="mark" value="5" @if(old('mark') === '5') checked @endif>
                                <span class="mr-4 min-w-20px w-20px h-20px min-h-20px"></span> 5
                            </label>
                        </div>

                        @error('mark')
                            <span class="invalid-feedback" role="alert" style="display: block;">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="font-size-h6 font-weight-bolder text-dark required">5. Ваши эмоции, состояние, настроение по итогам реализации этапа</label>
                        <livewire:feedback.mark-emotions id="emotion" name="emotion" value="{{ old('emotion') }}"></livewire:feedback.mark-emotions>

                        @error('emotion')
                            <span class="invalid-feedback" role="alert" style="display: block;">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                    <x-inputs.text-area name="comment" id="comment" title="6. Комментарий" placeholder="Текст комментария"></x-inputs.text-area>

                    <div class="button-group">
                        <a href="{{ route('dashboard') }}" class="btn btn-outline-primary rounded-pill px-8 mx-sm-2 my-2 font-size-h5 w-100 w-sm-auto">Назад / На главную</a>
                        <button class="btn btn-primary rounded-pill px-8 mx-sm-2 my-2 font-size-h5 w-100 w-sm-auto">Отправить отзыв</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <style>
        /* progress blue */
        .progress-blue .irs--flat .irs-bar,
        .progress-blue .irs--flat .irs-from,
        .progress-blue .irs--flat .irs-to,
        .progress-blue .irs--flat .irs-single,
        .progress-blue .irs--flat .irs-handle > i:first-child {
            background-color: #385E9D;
        }

        .progress-blue .irs--flat .irs-from:before,
        .progress-blue .irs--flat .irs-to:before,
        .progress-blue .irs--flat .irs-single:before {
            border-top-color: #385E9D;
        }

        /* warning progress */
        .progress-warning .irs--flat .irs-bar,
        .progress-warning .irs--flat .irs-from,
        .progress-warning .irs--flat .irs-to,
        .progress-warning .irs--flat .irs-single,
        .progress-warning .irs--flat .irs-handle > i:first-child {
            background-color: #FFA800;
        }

        .progress-warning .irs--flat .irs-from:before,
        .progress-warning .irs--flat .irs-to:before,
        .progress-warning .irs--flat .irs-single:before {
            border-top-color: #FFA800;
        }

        /* alla progress */
        .progress-alla .irs--flat .irs-bar,
        .progress-alla .irs--flat .irs-from,
        .progress-alla .irs--flat .irs-to,
        .progress-alla .irs--flat .irs-single,
        .progress-alla .irs--flat .irs-handle > i:first-child {
            background-color: #912F46;
        }

        .progress-alla .irs--flat .irs-from:before,
        .progress-alla .irs--flat .irs-to:before,
        .progress-alla .irs--flat .irs-single:before {
            border-top-color: #912F46;
        }
    </style>
@endpush
