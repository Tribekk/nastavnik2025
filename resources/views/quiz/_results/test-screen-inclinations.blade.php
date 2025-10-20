<div class="card-body" id="inclinations">
    <div class="d-flex flex-sm-nowrap flex-wrap">
        <div class="mr-5 max-w-225px">
            <h3 class="w-225px bg-alla rounded-pill text-white py-4 px-8 font-weight-bold font-size-lg font-hero text-center">Углубленный тест</h3>
            <div class="mx-5 mt-7">
                <h4 class="text-uppercase font-alla font-size-h5 font-hero font-weight-bold">Склонности</h4>
                <span class="text-dark-50 font-size-lg">Профессиональные предпочтения</span>
            </div>
        </div>
        <div class="separator separator-solid my-7 w-100 d-block d-sm-none"></div>
        <div class="ml-5 flex-grow-1">
            <div class="">
                @foreach($inclinationValues as $value)
                    <div class="row">
                        <div class="col-md-5 order-1 order-md-0">
                            <div class="progress mb-5 bg-transparent my-3" style="position: relative; width: 100%; height: 18px">
                                <div class="progress-bar rounded-pill" role="progressbar" style="width: {{ $value->percentage }}%; z-index: 2; background-color: {{$value->hexColor()}}"></div>
                                <div class="progress-bar bg-dark progress__bg-line" role="progressbar" style="width: 100%"></div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <a href="{{ route('quiz.inclination-details', [$inclinationQuiz, $value->inclination_id, 'backTo' => backResultsUrl('inclinations', $user->id)]) }}" class="text-dark font-size-h4 {{ $value->is_higher ? 'font-weight-bold' : '' }}">{{ $value->inclination->title }}</a>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-10">
                @forelse($inclinationTypes as $inclinationType)
                    <div class="mb-10">
                        <h3 class="font-size-h2 font-weight-bold font-hero text-center mt-0">{{ $inclinationType->inclination->title }}</h3>
                        <div class="font-size-h4 font-weight-bold text-dark mt-5">{!! $inclinationType->type->title !!}</div>
                        <div class="font-size-lg mt-5">{!! $inclinationType->type->description !!}</div>
                        <div class="font-size-lg text-dark-50 mt-5">{!! $inclinationType->inclination->professions_info !!}</div>
                        @if(!$loop->last)
                            <hr>
                        @endif
                    </div>
                @empty
                    <h3 class="font-size-h3 text-dark">Профессиональная склонность не выражена</h3>
                @endforelse
            </div>
        </div>
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
