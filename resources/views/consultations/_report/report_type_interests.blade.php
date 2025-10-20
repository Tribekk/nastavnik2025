@php
    $professionalTypes = \Domain\Quiz\Models\ProfessionalType::all();
    $availableQuiz =  \Domain\Quiz\Models\AvailableQuiz::where('user_id', $consultation->child_id)
        ->whereHas('quiz', function($q) { $q->where('slug', 'interests'); })->first();
@endphp

@foreach($professionalTypes as $type)

    @php $value = $consultation->child->professionalTypeResult->values->where('type_id', $type->id)->first() @endphp

    <div class="row mt-8 px-1 px-md-15">
        <div class="col-6 col-md-8">
            <div class="progress mt-3">
                <div class="progress-bar bg-{{ $value->color }}" role="progressbar" style="width: {{ $value->percentage ?? 0 }}%" aria-valuenow="{{ $value->percentage ?? 0 }}" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </div>
        <div class="col-6 col-md-4">
            <div class="font-size-lg">
                <a class="link" href="{{ route('quiz.type-details', [$availableQuiz, $type, 'backTo' => route('consultations.edit', $consultation)."#report-tab",]) }}">
                    {{ $type->area }}
                </a>
            </div>
        </div>
    </div>
@endforeach

<div class="row mt-15">
    <div class="col">
        <div>
            <span class="font-hero-super font-blue">Полученные результаты достоверны на</span> <span class="font-size-h2 font-hero-super font-alla">{{ $consultation->child->professionalTypeResult->reliabilityPercentage == 70 ? 'менее 70' : $consultation->child->professionalTypeResult->reliabilityPercentage }}%</span>
        </div>
        <div class="font-size-lg mt-2">
            {{ $consultation->child->professionalTypeResult->reliabilityDescription }}
        </div>
    </div>
</div>
