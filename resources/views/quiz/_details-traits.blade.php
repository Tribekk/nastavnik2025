<h3 class="font-pixel font-orange font-size-h1 mb-10">
    Результаты: особенности характера
</h3>

<div>
    <a class="link font-size-h3" href="{{ request('backTo', false) ? request('backTo') : route('quiz.result', $availableQuiz) }}">К результатам</a>
</div>

<p class="text-dark-50 text-md-right">
    Чем выше показатель тем ярче выражена черта<br>
    <b>Степень проявленности этого качества указана в процентах</b>
</p>

<div class="row mt-10">
    <div class="col-lg-3 d-flex align-content-center">
        <ul class="list-unstyled text-uppercase">
            @foreach($resultTraits as $currentTrait)
                <li class="mb-5">
                    @if($currentTrait->trait->id == $trait->id)
                        <a class="font-hero-super font-size-md-h4 font-size-h5 {{ $currentTrait->is_higher ? 'font-orange' : 'font-alla' }}" href="{{ route('quiz.trait-details', ['availableQuiz' => $availableQuiz, 'trait' => $currentTrait->trait, 'backTo' => request('backTo', false)]) }}">
                            {{ $currentTrait->is_higher ? $currentTrait->trait->higher_value : $currentTrait->trait->lower_value }}
                        </a>
                    @else
                        <a class="font-grey-light font-size-md-h4 font-size-h5" href="{{ route('quiz.trait-details', ['availableQuiz' => $availableQuiz, 'trait' => $currentTrait->trait, 'backTo' => request('backTo', false)]) }}">
                            {{ $currentTrait->is_higher ? $currentTrait->trait->higher_value : $currentTrait->trait->lower_value }}
                        </a>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
    <div class="col-lg-5">
        <div id="chart">
        </div>
    </div>
    <div class="col-lg-4">
        <h3 class="font-{{ $wrapper->color($resultValue->is_higher) }} text-center font-hero font-size-h3">{{ $resultValue->title }}</h3>
        <div class="font-size-lg">
            {!! $resultValue->description !!}
        </div>
    </div>
</div>

@push('scripts')
    <script>
        var options = {
            series: [{{ $resultValue->percentage }}],
            chart: {
                height: 350,
                type: 'radialBar',
            },
            plotOptions: {
                radialBar: {
                    hollow: {
                        size: '50%',
                    }
                },

            },
            responsive: [{
                breakpoint: 1080,
                options: {
                    chart: {
                        height: 250
                    },
                }
            },
                {
                    breakpoint: 992,
                    options: {
                        chart: {
                            height: 350
                        },
                    }
                },
                {
                    breakpoint: 380,
                    options: {
                        chart: {
                            height: 300
                        },
                    }
                }],
            colors: [function({ value, seriesIndex, w }) {
                if ({{ $resultValue->is_higher ? 'true' : 'false' }}) {
                    return '#FFC72C'
                } else {
                    return '#912F46'
                }
            }],
            labels: [{!! $wrapper->titleAsArray($trait, $resultValue->is_higher) !!}],
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    </script>
@endpush
