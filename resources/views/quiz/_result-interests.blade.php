<h3 class="font-pixel font-orange font-size-h1 mb-10">
    Результаты: {{ $availableQuiz->quiz->title }}
</h3>

@if(!isset($disablePreviousLink))
    <div>
        <a role="button" class="link font-size-h3" href="{{ route('quiz.view') }}">К списку анкет и тестов</a>
    </div>
@endif

@foreach($types as $type)

    @php $value = $result->values->where('type_id', $type->id)->first() @endphp

    <div class="row mt-15 px-1 px-md-15">
        <div class="col-6 col-md-8">
            <div class="progress mt-3">
                <div class="progress-bar bg-{{ $value->color }}" role="progressbar" style="width: {{ $value->percentage ?? 0 }}%" aria-valuenow="{{ $value->percentage ?? 0 }}" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </div>
        <div class="col-6 col-md-4">
            <div class="font-size-lg">
                <a class="link" href="{{ route('quiz.type-details', [$availableQuiz, $type, 'backTo' => $backTo ?? false]) }}">
                    {{ $type->area }}
                </a>
            </div>
        </div>
    </div>
@endforeach

<div class="row mt-20 px-1 px-md-15">
    <div class="col-6 col-md-9">
        <div class="progress">
            <div class="progress-bar bg-alla" role="progressbar" style="width: {{ $result->reliabilityPercentage }}%" aria-valuenow="{{ $result->reliabilityPercentage }}" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="font-size-lg">
            Шкала честности
        </div>
    </div>
</div>

<div class="row mt-10 px-1 px-md-15">
    <div class="col">
        <div>
            <span class="font-hero-super font-blue">Полученные результаты достоверны на</span> <span class="font-size-h2 font-hero-super font-alla">{{ $result->reliabilityPercentage == 70 ? 'менее 70' : $result->reliabilityPercentage }}%</span>
        </div>
        <div class="font-size-lg mt-2">
            {{ $result->reliabilityDescription }}
        </div>
    </div>
</div>
