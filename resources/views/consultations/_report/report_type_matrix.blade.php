@php

        $matrix = \Domain\Quiz\Models\SuitableProfessionResult::where('user_id', 133)
                ->orderByDesc('created_at')
                ->first()->careerMatrix;
@endphp

<h4 class="font-size-h4 font-alla font-hero mb-5">
    Профессии: "{{ $matrix->activityObject->title }}" + "{{ $matrix->activityKind->title }}"
</h4>

<p class="font-size-h6">
    {{ $matrix->description }}
</p>

<h4 class="font-size-h4 font-alla font-hero mt-10 mb-5">
    Примеры профессий:
</h4>

<p class="font-size-h6 mb-10">
    {!! $matrix->professions !!}
</p>
