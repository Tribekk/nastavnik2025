@php
    $inclinationResult = $consultation->child->inclinationResult;
    if($inclinationResult) {
        $resultValues = $inclinationResult->values;
        $inclinationTypes = $inclinationResult->values()->where('is_higher', 1)->get();
    }

    $availableQuiz = \Domain\Quiz\Models\AvailableQuiz::where('user_id', $consultation->child_id)
        ->whereHas('quiz', function($q) { $q->where('slug', 'inclinations'); })->first();
@endphp

<div class="row">
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
                    <a href="{{ route('quiz.inclination-details', [$availableQuiz, $value->inclination_id, 'backTo' => route('consultations.edit', $consultation)."#report-tab",]) }}" class="text-dark font-size-h4 {{ $value->is_higher ? 'font-weight-bold' : '' }}">{{ $value->inclination->title }}</a>
                </div>
            </div>
        @endforeach
    </div>
    <div class="col-md-5">
        @forelse($inclinationTypes as $inclinationType)
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
