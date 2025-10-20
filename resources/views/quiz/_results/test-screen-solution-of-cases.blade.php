<div class="card-body" id="intelligence-level">
    <div class="d-flex flex-sm-nowrap flex-wrap">
        <div class="mr-5 max-w-225px">
            <h3 class="w-225px bg-alla rounded-pill text-white py-4 px-8 font-weight-bold font-size-lg font-hero text-center">Углубленный тест</h3>
            <div class="mx-5 mt-7">
                <h4 class="text-uppercase font-alla font-size-h5 font-hero font-weight-bold">Решение кейсов</h4>
                <span class="text-dark-50 font-size-lg">Аспекты мотивации, самооценка, отношение к делу, взаимодействие в команде</span>
            </div>
        </div>
        <div class="separator separator-solid my-7 w-100 d-block d-sm-none"></div>
        <div class="ml-5 flex-grow-1">
            @foreach($situations as $situation)
                <div class="mb-15">
                    <h2 class="font-size-h2 font-alla">{{ $situation->title }}</h2>
                    <h5 class="font-size-h5 font-weight-bold">{{ $situation->content }}</h5>

                    @php
                        $results = $solutionCasesWrapper->results($situation->id, $solutionCasesResult->id);
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
    </div>
</div>
