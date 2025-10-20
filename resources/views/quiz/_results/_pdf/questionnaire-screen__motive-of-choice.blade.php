<div class="screen">
    <div class="content">
        <div style="width: 225px; padding-right: 30px; display: inline-block">
            <h3 class="font-hero font-size-h5 pill pill__blue" style="margin-bottom: 10px; height: 40px; line-height: 25px; border-radius: 20px">Анкетные данные</h3>
            <div style="margin-left: 10px">
                <h4 class="text-blue font-hero font-weight-bold m-0">МОТИВЫ ВЫБОРА</h4>
                <span class="text-dark-50">Ключевые ориентиры любой деятельности</span>
            </div>
        </div>
        <div style="display: inline-block; width: 700px; float: right;">
            <div style="word-wrap: break-word; white-space: pre-line;">
                <h3 class="font-weight-bold text-blue font-size-h4 mb-2">Я ценю в себе и людях</h3>
                @foreach($questionnaireResult->valuesMeAndPeople as $value)
                    <div class="font-size-h5" style="word-wrap: break-word;">
                        <span class="text-dark-50">{{ $value['title'] }}</span>
                        @if($value['description']) - {{ $value['description'] }}@endif
                    </div>
                @endforeach
            </div>

            <div class="mt-5" style="word-wrap: break-word; white-space: pre-line;">
                <h3 class="font-weight-bold text-blue font-size-h4 mb-2">При выборе работы мне важно</h3>
                @foreach($questionnaireResult->importantWhenChoosingJob as $value)
                    <div class="font-size-h5" style="word-wrap: break-word;">{{ $value }}</div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<!-- график -->
<div class="screen">
    <div class="content">
        <div style="width: 225px; padding-right: 30px; display: inline-block">
            <h3 class="font-hero font-size-h5 pill pill__blue" style="margin-bottom: 10px; height: 40px; line-height: 25px; border-radius: 20px">Анкетные данные</h3>
            <div style="margin-left: 10px">
                <h4 class="text-blue font-hero font-weight-bold m-0">МОТИВЫ ВЫБОРА</h4>
                <span class="text-dark-50">Ключевые ориентиры любой деятельности</span>
            </div>
        </div>
        <div style="display: inline-block; width: 700px; float: right;">
            <h3 class="font-weight-bold text-blue font-size-h4 mb-2">Ради этого я буду работать</h3>

            <div style="margin-top: 20px; width: 700px">
                @foreach($resultFactorMotiveOfChoice as $factor)
                    <div style="width: 700px">
                        <div style="width: 380px; margin-right: 20px; display: inline-block; vertical-align: top;">
                            <div class="progress bg-transparent">
                                <div class="progress-bar {{ $factor->percentage >= 50 ? $progressColor ?? 'bg-blue' : 'bg-gray' }}" role="progressbar" style="width: {{ $factor->percentage }}%;"></div>
                                <div class="progress-bar bg-dark progress__bg-line" role="progressbar" style="width: 100%;"></div>
                            </div>
                        </div>
                        <div style="width: 300px; display: inline-block; vertical-align: top;">
                            <h4 class="font-size-h5">
                                <span class="{{ $factor->percentage >= 50 ? $textColor ?? 'text-blue' : 'text-dark-50' }}">
                                    {{ $factor->factor->title }}
                                </span>
                            </h4>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
