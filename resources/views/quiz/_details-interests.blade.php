<h3 class="font-pixel font-orange font-size-h1 mb-10">
    Общая характеристика профессий
</h3>

<div>
    <a class="link font-size-h3" href="{{ request('backTo', false) ? request('backTo') : route('quiz.result', $availableQuiz) }}">К результатам</a>
</div>

@php
    /** @var \Domain\Quiz\Models\ProfessionalType $type */
    /** @var \Domain\Quiz\Models\ProfessionalTypeResult $result */
@endphp

<div class="row mt-10">
    <div class="col-lg-12">
        <h2 class="text-center font-hero-super font-size-h2 font-blue text-center">
            {{ $type->title }}
        </h2>
        <h4 class="text-center font-size-h4 mb-5">
            У Вас {{ $result->value($type) }} балл(ов)
        </h4>
        <div class="font-size-lg mb-10">
            {!! $type->description !!}
        </div>

        @foreach($type->professions as $profession)
            <h3 class="font-size-h3 font-alla font-hero">{!! $profession->title !!}</h3>
            <div class="row font-size-lg mb-10">
                <div class="col-md-8">
                    {!! $profession->description !!}
                </div>
                <div class="col-md-4">
                    {!! $profession->competence !!}
                </div>
            </div>
        @endforeach
    </div>
</div>
