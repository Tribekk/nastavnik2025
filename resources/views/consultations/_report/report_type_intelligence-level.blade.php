@php
    $intelligenceLevelResult = $consultation->child->intelligenceLevelResult;
    $intelligenceLevelValues = $intelligenceLevelResult->values;
@endphp

<div class="row align-items-center">
    <div class="col-md-3">
        <div id="chart">
        </div>
    </div>
    <div class="col-md-9">
        <h4 class="font-size-h4 font-hero">Твой уровень интеллекта - {{ $intelligenceLevelResult->level->title }}</h4>
        <p class="font-size-h5">определяет общую способность к решению
            практических и интеллектуальных задач</p>
    </div>
</div>

<div class="separator separator-solid my-7 d-block d-md-none"></div>

@foreach($intelligenceLevelValues as $value)
    <div class="row">
        <div class="col-md-4 col-sm-5 my-2 order-1 order-md-0">
            <div class="progress mb-5 bg-transparent my-3" style="position: relative; width: 100%; height: 18px">
                <div class="progress-bar rounded-pill" role="progressbar" style="width: {{ $value->percentage }}%; z-index: 2; background-color: {{ $value->hexColor() }}"></div>
                <div class="progress-bar bg-dark progress__bg-line" role="progressbar" style="width: 100%"></div>
            </div>
        </div>
        <div class="col-md-8 col-sm-7 my-2">
            <p class="text-dark font-weight-bold font-size-lg">{{ $value->type->title }}</p>
            <p class="text-dark font-size-lg">{{ $value->type->description }}</p>
        </div>
    </div>
@endforeach

@push('scripts')
    <script>
        var options = {
            series: [{{ $intelligenceLevelResult->percentage }}],
            chart: {
                height: 250,
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
                return "{{ $intelligenceLevelResult->hexColor() }}"
            }],
            labels: ["{!! $intelligenceLevelResult->level->title !!}"],
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    </script>
@endpush

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
