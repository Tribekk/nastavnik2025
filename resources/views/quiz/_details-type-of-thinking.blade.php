<h3 class="font-pixel font-orange font-size-h1 mb-10">
    Результаты: {{ $availableQuiz->quiz->title }}
</h3>

<div>
    <a class="link font-size-h3" href="{{ request('backTo', false) ? request('backTo') : route('quiz.result', $availableQuiz) }}">К результатам</a>
</div>

<div class="row mt-10">
    <div class="col-md-4">
        <div id="chart">
        </div>

        <div class="font-size-h4 text-center font-hero">Набрано: <span class="{{ $typeResult->is_higher ? 'text-success' : 'font-blue' }}">{{ $typeResult->value }} баллов</span></div>
    </div>
    <div class="col-md-8">
        <div>
            <h3 class="text-center font-hero font-size-h2">{{ $type->title }}</h3>
            <div class="font-size-lg mt-8 font-size-h4">
                {!! $type->description !!}
            </div>
        </div>

        <div class="mt-12">
            <h3 class="font-size-h4 text-dark font-weight-bold">
                {!! $typeResult->manifestation->title !!}
            </h3>

            @if($typeResult->manifestation->description)
                <div class="font-size-lg text-dark mt-5">
                    {!! $typeResult->manifestation->description !!}
                </div>
            @endif
        </div>
    </div>
</div>

<p class="text-dark-50 text-md-right mt-10">
    5 баллов – выраженный тип мышления;<br>
    3-4 баллов – средне выраженный тип мышления;<br>
    0-2 баллов – тип мышления не выражен.
</p>

@push('scripts')
    <script>
        var options = {
            series: [{{ $typeResult->percentage }}],
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
            colors: [function({ value, seriesIndex, w }) {
                return "{{ $type->hex_color }}"
            }],
            labels: ["{!! $type->short_title !!}"],
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    </script>
@endpush
