<div class="screen">
    <div class="content">
        <div style="width: 225px; padding-right: 30px; display: inline-block;">
            <h3 class="font-hero font-size-h5 pill pill__alla" style="margin-bottom: 10px; height: 40px; line-height: 25px; border-radius: 20px">Углубленный тест</h3>
            <div style="margin-left: 10px">
                <h4 class="text-alla font-hero font-weight-bold m-0">РЕШЕНИЕ КЕЙСОВ</h4>
                <span class="text-dark-50">Эффективный способ преобразования информации, коммуникаций и решения задач</span>
            </div>
        </div>
        <div style="display: inline-block; width: 700px; float: right;">
            @foreach($situations as $situation)
                <div style="margin-bottom: 20px; min-height: 500px;">
                    <h2 class="font-size-h3 text-alla">{{ $situation->title }}</h2>
                    <h5 class="font-size-h4 font-weight-bold">{{ $situation->content }}</h5>

                    @php
                        $results = $solutionCasesWrapper->results($situation->id, $solutionCasesResult->id);
                    @endphp

                    @foreach($results as $value)
                        <div class="" style="margin-top: 15px;">
                            @if($value->description)
                                <h4 class="font-weight-bold font-size-h5" style="margin-bottom: 14px;">{{ $value->description }}</h4>
                            @endif

                            {!! $value->interpretation->content !!}
                        </div>
                    @endforeach

                    @if(!$loop->last)
                        @if(($loop->index + 1) % 2 == 0)
                            <div style="page-break-after: always"></div>
                        @else
                            <div style="margin-top: 20px; width: 700px;">
                                <hr>
                            </div>
                        @endif
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</div>
