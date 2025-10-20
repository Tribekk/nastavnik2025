<h3 class="font-pixel font-orange font-size-h1 mb-10">
    Результаты: {{ $availableQuiz->quiz->title }}
</h3>

@if(!isset($disablePreviousLink))
    <div>
        <a role="button" class="link font-size-h3" href="{{ route('quiz.view') }}">К списку анкет и тестов</a>
    </div>
@endif

<div class="row mt-6">
    <div class="col-md-7">
        @foreach($resultValues as $value)
            <div class="row">
                <div class="col-md-8 order-1 order-md-0">
                    <div class="progress mb-5 bg-transparent my-3" style="position: relative; width: 100%; height: 18px">
                        <div class="progress-bar rounded-pill" role="progressbar" style="width: {{ $value->percentage }}%; z-index: 2; background-color: {{$value->hexColor()}}"></div>
                        <div class="progress-bar bg-dark progress__bg-line" role="progressbar" style="width: 100%"></div>
                    </div>
                </div>
                <div class="col-md-4">
                    <a href="{{ route('quiz.inclination-details', [$availableQuiz, $value->inclination_id]) }}" class="text-dark font-size-h4 {{ $value->is_higher ? 'font-weight-bold' : '' }}">{{ $value->inclination->title }}</a>
                </div>
            </div>
        @endforeach
    </div>
    <div class="col-md-5">
        @forelse($userTypes as $inclinationType)
            <div class="mb-10">
                <h3 class="font-size-h2 font-weight-bold font-hero text-center mt-0">{{ $inclinationType->inclination->title }}</h3>
                <div class="font-size-h4 font-weight-bold text-dark mt-5">{!! $inclinationType->type->title !!}</div>
                <div class="font-size-lg mt-5">{!! $inclinationType->type->description !!}</div>
                <div class="font-size-lg text-dark-50 mt-5">{!! $inclinationType->inclination->professions_info !!}</div>
                <hr>
            </div>
            @empty
            <h3 class="font-size-h3 text-dark">Профессиональная склонность не выражена</h3>
        @endforelse
    </div>
</div>

@push('css')
    <style>
        .progress__bg-line {
            width: 100%;
            height: 2px;
            top: 50%;
            left: 0;
            transform: translate(0, -50%);
            position: absolute;
            border-radius: 0;
        }
    </style>
@endpush
