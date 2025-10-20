<h3 class="font-pixel font-orange font-size-h1 mb-10">
    Результаты: {{ $availableQuiz->quiz->title }}
</h3>

@if(!isset($disablePreviousLink))
    <div>
        <a role="button" class="link font-size-h3" href="{{ route('quiz.view') }}">К списку анкет и тестов</a>
    </div>
@endif

<h4 class="font-size-h3 font-alla font-hero mt-10 mb-5">
    Профессии: "{{ $matrix->activityObject->title }}" + "{{ $matrix->activityKind->title }}"
</h4>

<p class="font-size-h4">
    {{ $matrix->description }}
</p>

<h4 class="font-size-h3 font-alla font-hero mt-10 mb-5">
    Примеры профессий:
</h4>

<p class="font-size-h4 mb-10">
    {!! $matrix->professions !!}
</p>

<a href="{{ route('quiz.person-types', $availableQuiz) }}" class="btn btn-lg btn-primary font-hero-super">Посмотреть мой типаж и рекомендации</a>
