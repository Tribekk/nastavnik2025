<h3 class="font-pixel font-orange font-size-h1 mb-10">
    Результаты: склонности
</h3>

<div>
    <a class="link font-size-h3" href="{{ request('backTo', false) ? request('backTo') : route('quiz.result', $availableQuiz) }}">К результатам</a>
</div>

<div class="row mt-10">
    <div class="col-md-4">
        <div id="chart">
        </div>

        <div class="font-size-h4 text-center font-hero">Набрано: <span style="color: {{ $inclinationResult->hexColor() }};">{{ $inclinationResult->value }} баллов</span></div>
    </div>
    <div class="col-md-8">
        <div>
            <h3 class="text-center font-hero font-size-h2" style="color: {{ $inclinationResult->hexColor() }};">{{ $inclination->title }}</h3>
            <div class="font-size-lg mt-8 font-weight-bold font-size-h4">
                {!! $inclination->description !!}
            </div>

            <div class="font-size-lg text-dark mt-5">
                {!! $inclination->professions_info !!}
            </div>
        </div>

        <div class="mt-12">
            <h3 class="font-size-h4 text-dark font-weight-bold">
                {!! $inclinationResult->type->title !!}
            </h3>

            <div class="font-size-lg text-dark mt-5">
                {!! $inclinationResult->type->description !!}
            </div>
        </div>
    </div>
</div>

<p class="text-dark-50 text-md-right mt-10">
    10-12 баллов – ярко выраженная профессиональная склонность;<br>
    7-9 баллов – средне выраженная профессиональная склонность;<br>
    4-6 баллов – слабо выраженная профессиональная склонность;<br>
    0-3 баллов – профессиональная склонность не выражена.
</p>

@push('scripts')
    <script>
        var options = {
            series: [{{ $inclinationResult->percentage }}],
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
                return "{{ $inclinationResult->hexColor() }}"
            }],
            labels: ["{!! $inclination->title !!}"],
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    </script>
@endpush
