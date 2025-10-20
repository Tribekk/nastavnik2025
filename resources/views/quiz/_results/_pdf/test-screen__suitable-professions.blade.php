<div class="screen">
    <div class="content">
        <div style="width: 225px; padding-right: 30px; display: inline-block;">
            <h3 class="font-hero font-size-h5 pill pill__orange" style="margin-bottom: 10px; height: 40px; line-height: 25px; border-radius: 20px">«Образ Я»</h3>
            <div style="margin-left: 10px">
                <h4 class="text-orange font-hero font-weight-bold m-0">ПОДХОДЯЩИЕ ПРОФЕССИИ</h4>
                <span class="text-dark-50">Варианты выбора</span>
            </div>
        </div>
        <div style="display: inline-block; width: 700px; float: right;">
            <div style="">
                <h4 class="font-pixel text-dark-50" style="margin-bottom: 20px">Результаты: уточнение выбора профессии</h4>
                <h4 class="font-size-h4 text-blue font-hero" style="margin-top: 25px; margin-bottom: 10px">
                    Профессии "{{ $suitableProfessionMatrix->activityObject->title }}" + "{{ $suitableProfessionMatrix->activityKind->title }}"
                </h4>

                <p class="font-size-h5" style="white-space: pre-line;">
                    {{ $suitableProfessionMatrix->description }}
                </p>


                <h4 class="font-size-h4 text-blue font-hero" style="margin-top: 25px; margin-bottom: 10px">
                    Примеры профессий:
                </h4>

                <p class="font-size-h5" style="white-space: pre-line;">
                    {!! $suitableProfessionMatrix->professions !!}
                </p>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
