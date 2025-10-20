<div class="screen">
    <div class="content">
        <div style="width: 225px; padding-right: 30px; display: inline-block;">
            <h3 class="font-hero font-size-h5 pill pill__alla" style="margin-bottom: 10px; height: 40px; line-height: 25px; border-radius: 20px">Углубленный тест</h3>
            <div style="margin-left: 10px">
                <h4 class="text-alla font-hero font-weight-bold m-0">СКЛОННОСТИ</h4>
                <span class="text-dark-50">Профессиональные предпочтения</span>
            </div>
        </div>
        <div style="display: inline-block; width: 700px; float: right;">
            @foreach($inclinationValues as $value)
                <div style="width: 700px">
                    <div style="width: 480px; margin-right: 20px; display: inline-block; vertical-align: top;">
                        <div class="progress bg-transparent">
                            <div class="progress-bar" role="progressbar" style="width: {{ $value->percentage }}%; z-index: 2; background-color: {{$value->hexColor()}}"></div>
                            <div class="progress-bar bg-dark progress__bg-line" role="progressbar" style="width: 100%;"></div>
                        </div>
                    </div>
                    <div style="width: 200px; display: inline-block; vertical-align: top;">
                        <h4 class="font-size-h5 {{ $value->is_higher ? 'font-weight-bold text-green' : ($value->value > 3 ? 'text-alla' : 'text-dark-50') . ' font-weight-normal' }}">
                            {{ $value->inclination->title }}
                        </h4>
                    </div>
                </div>
            @endforeach

            <div style="width: 700px; margin-top: 40px; word-wrap: break-word;">
                @forelse($inclinationTypes as $inclinationType)
                    <div style="margin-bottom: 20px;">
                        <h3 class="font-size-h4 font-weight-bold font-hero text-center mt-0">{{ $inclinationType->inclination->title }}</h3>
                        <div class="font-size-h5 font-weight-bold text-dark" style="margin-bottom: 10px;">{!! $inclinationType->type->title !!}</div>
                        <div class="font-size-h5" style="margin-bottom: 20px;">{!! $inclinationType->type->description !!}</div>
                        <div class="font-size-h5 text-dark-50" style="margin-bottom: 15px;">{!! $inclinationType->inclination->professions_info !!}</div>
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
                @empty
                    <h3 class="font-size-h4 text-dark text-alla">Профессиональная склонность не выражена</h3>
                @endforelse
            </div>
        </div>
    </div>
</div>
