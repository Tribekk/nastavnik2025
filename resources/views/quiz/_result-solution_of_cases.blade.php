<h3 class="font-pixel font-orange font-size-h1 mb-10">
    Результаты: {{ $availableQuiz->quiz->title }}
</h3>

@if(!isset($disablePreviousLink))
    <div>
        <a role="button" class="link font-size-h3" href="{{ route('quiz.view') }}">К списку анкет и тестов</a>
    </div>
@endif

<div class="row mt-10">
    @foreach($situations as $situation)
        <div class="col-md-6 my-3">
            <h2 class="font-size-h2 font-blue">{{ $situation->title }}</h2>
            <h5 class="font-size-h5 font-weight-bold">{{ $situation->content }}</h5>

            @php
                $results = $wrapper->results($situation->id, $result->id);
            @endphp

            @foreach($results as $value)
                <div class="mt-8">
                    @if($value->description)
                        <h4 class="font-weight-bold mb-3 font-size-h6">{{ $value->description }}</h4>
                    @endif

                    {!! $value->interpretation->content !!}
                </div>
            @endforeach
        </div>
    @endforeach
</div>
