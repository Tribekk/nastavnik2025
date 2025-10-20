<div class="screen">
    <div class="content">
        <div style="width: 225px; padding-right: 30px; display: inline-block;">
            <h3 class="font-hero font-size-h5 pill pill__alla" style="margin-bottom: 10px; height: 40px; line-height: 25px; border-radius: 20px">Углубленный тест</h3>
            <div style="margin-left: 10px">
                <h4 class="text-alla font-hero font-weight-bold m-0">ТИП МЫШЛЕНИЯ</h4>
                <span class="text-dark-50">Эффективный способ преобразования информации, коммуникаций и решения задач</span>
            </div>
        </div>
        <div style="display: inline-block; width: 700px; float: right;">
            @foreach($typeThinkingValues as $value)
                <div style="width: 700px">
                    <div style="width: 400px; margin-right: 20px; display: inline-block; vertical-align: top;">
                        <div class="progress bg-transparent">
                            <div class="progress-bar" role="progressbar" style="width: {{ $value->percentage }}%; z-index: 2; background-color: {{$value->hexColor()}}"></div>
                            <div class="progress-bar bg-dark progress__bg-line" role="progressbar" style="width: 100%;"></div>
                        </div>
                    </div>
                    <div style="width: 360px; display: inline-block; vertical-align: top;">
                        <h4 class="font-size-h5 {{ $value->is_higher ? 'font-weight-bold text-green' : ($value->value > 3 ? 'text-blue' : 'text-dark-50') . ' font-weight-normal' }}">
                            {{ $value->type->title }}
                        </h4>
                    </div>
                </div>
            @endforeach

            <div style="width: 700px; margin-top: 40px;">
              @forelse($thinkingTypes as $thinkingType)
                    <div style="margin-bottom: 20px;">
                        <h3 class="font-size-h4 font-weight-bold text-blue mb-0">{!! $thinkingType->type->title !!}</h3>
                        <div class="font-size-h5">{!! $thinkingType->type->who_is_it !!}</div>

                        <div class="font-size-h5">{!! $thinkingType->type->description !!}</div>

                        <h4 class="font-size-h4 font-weight-bold text-dark-50 mb-0 mt-5">{!! $thinkingType->manifestation->title !!}</h4>
                        @if($thinkingType->manifestation->description)
                            <div class="font-size-h5">{!! $thinkingType->manifestation->description !!}</div>
                        @endif

                        @if(!$loop->last)
                            @if($loop->index == 0)
                                <div style="page-break-after: always"></div>
                            @elseif(($loop->index + 2) % 2 == 0)
                                <div style="page-break-after: always"></div>
                            @else
                                <div style="margin-top: 20px; width: 700px;">
                                    <hr>
                                </div>
                            @endif
                        @endif
                    </div>
                @empty
                    <h3 class="font-size-h4 text-dark text-alla">Тип мышления не выражен</h3>
                @endforelse
            </div>
        </div>
    </div>
</div>
