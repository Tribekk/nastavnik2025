<div class="screen">
    <div class="content">
        <div style="width: 225px; padding-right: 30px; display: inline-block;">
            <h3 class="font-hero font-size-h5 pill pill__alla" style="margin-bottom: 10px; height: 40px; line-height: 25px; border-radius: 20px">Углубленный тест</h3>
            <div style="margin-left: 10px">
                <h4 class="text-alla font-hero font-weight-bold m-0">ОБЩИЙ УРОВЕНЬ ИНТЕЛЛЕКТА</h4>
                <span class="text-dark-50">Способности, восприятие информации, уровень абстрактно-логического мышления</span>
            </div>
        </div>
        <div style="display: inline-block; width: 700px; float: right;">
           <div style="width: 700px; margin-bottom: 70px;">
               <h3 class="font-size-h2 font-weight-bold font-hero">Твой уровень интеллекта - {{ $intelligenceLevelResult->level->title }}</h3>
               <h4 class="font-size-h5">определяет общую способность к решению
                   практических и интеллектуальных задач</h4>
           </div>

            <div style="width: 700px;">
                @foreach($intelligenceLevelValues as $value)
                    <div style="width: 700px; margin-bottom: 20px;">
                        <div style="margin-bottom: 12px;">
                            <h3 class="text-dark font-weight-bold font-size-h5">{{ $value->type->title }}</h3>
                            <h4 class="text-dark-50 font-weight-bold font-size-h5">{{ $value->type->description }}</h4>
                        </div>

                        <div class="progress bg-transparent">
                            <div class="progress-bar" role="progressbar" style="width: {{ $value->percentage }}%; z-index: 2; background-color: {{$value->hexColor()}}"></div>
                            <div class="progress-bar bg-dark progress__bg-line" role="progressbar" style="width: 100%;"></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
