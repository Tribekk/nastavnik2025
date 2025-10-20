<div class="screen">
    <div class="content">
        <div style="width: 225px; padding-right: 30px; display: inline-block;">
            <h3 class="font-hero font-size-h5 pill pill__blue" style="margin-bottom: 10px; height: 40px; line-height: 25px; border-radius: 20px">Анкетные данные</h3>
            <div style="margin-left: 10px">
                <h4 class="text-blue font-hero font-weight-bold m-0">ГОТОВНОСТЬ К ВЫБОРУ</h4>
                <span class="text-dark-50">Карьерные предпочтения и образ будущего</span>
            </div>
        </div>
        <div style="display: inline-block; width: 700px; float: right;">
            <div style="width: 380px; margin-right: 20px; display: inline-block; vertical-align: top; white-space: pre-line;">
                <h3 class="font-weight-bold text-blue font-size-h4 mb-2">Мне больше подходит</h3>
                <div class="font-size-h5 text-dark" style="word-wrap: break-word;">{{ $questionnaireResult->suitsMeBetter }}</div>

                <div class="mt-5">
                    <h3 class="font-weight-bold text-blue font-size-h4 mb-2">Мое идеально будущее</h3>
                    @foreach($questionnaireResult->perfectFuture as $value)
                        <div class="font-size-h5 mb-2" style="word-wrap: break-word;">{{ $value }}</div>
                    @endforeach
                </div>

                <div class="mt-5">
                    <h3 class="font-weight-bold text-blue font-size-h4 mb-2">Отношение к заключению договора целевого обучения с работодателем</h3>
                    <div class="font-size-h5 text-dark" style="word-wrap: break-word;">{{ $questionnaireResult->concludingContractTargetedTraining }}</div>
                </div>

                <div class="mt-5">
                    <h3 class="font-weight-bold text-blue font-size-h3 mb-2">Вероятность, что я останусь в родном городе</h3>
                    <div class="mt-5">
                        <div class="font-weight-bold font-size-h5 text-center text-blue mb-2">{{ $questionnaireResult->chancesOfStayingHometown['value'] }}</div>
                        <div class="progress mb-4 bg-transparent my-3" style="position: relative; width: 100%; height: 18px">
                            <div class="progress-bar bg-blue" role="progressbar" style="width: {{ $questionnaireResult->chancesOfStayingHometown['progress'] }}%; z-index: 2;"></div>
                            <div class="progress-bar bg-dark progress__bg-line" role="progressbar" style="width: 100%"></div>
                        </div>
                        <div style="margin-top: 12px; width: 380px;">
                            <div style="display: inline-block; float:left;">1</div>
                            <div style="display: inline-block; float: right;">10</div>
                        </div>
                    </div>
                </div>
            </div>

            <div style="width: 270px; display: inline-block; vertical-align: top; float: right; white-space: pre-line;">
                <h3 class="font-weight-bold text-blue font-size-h4 mb-2">Выбор экзаменов для ЕГЭ</h3>
                <div class="font-size-h5 my-2" style="word-wrap: break-word;">
                    {{ $questionnaireResult->chosenExams }}
                </div>

                <div class="mt-5">
                    <h3 class="font-weight-bold text-blue font-size-h4 mb-2">Интересно получать предложения от работодателей об экскурсиях, подготовительных курсах, целевом обучении, стажировках</h3>
                    <div class="font-size-h5 text-dark" style="word-wrap: break-word;">{{ $questionnaireResult->receiveOffersFromTheEmployer }}</div>
                </div>

                <div class="mt-5">
                    <h3 class="font-weight-bold text-primary font-size-h4">На текущий момент проявлена</h3>
                    <div class="font-size-h5 text-dark" style="word-wrap: break-word;">{{ $questionnaireResult->willingness_to_choose_profession_label }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
