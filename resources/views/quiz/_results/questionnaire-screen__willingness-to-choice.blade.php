<div class="card-body">
    <div class="d-flex flex-sm-nowrap flex-wrap">
        <div class="mr-5 max-w-225px">
            <h3 class="w-225px bg-blue rounded-pill text-white py-4 px-8 font-weight-bold font-size-lg font-hero text-center">Анкетные данные</h3>
            <div class="mx-5 mt-7">
                <h4 class="text-uppercase font-blue font-size-h5 font-hero font-weight-bold">Готовность к выбору</h4>
                <span class="text-dark-50 font-size-lg">Карьерные предпочтения и образ будущего</span>
            </div>
        </div>
        <div class="separator separator-solid my-7 w-100 d-block d-sm-none"></div>
        <div class="ml-5 flex-grow-1">
            <div class="row">
                <div class="col-md-7 my-4">
                    <h3 class="font-weight-bold font-blue font-size-h3 mb-2">Мне больше подходит</h3>
                    <p class="font-size-h6 text-dark text-break">{{ $questionnaireResult->suitsMeBetter }}</p>

                    <div class="mt-5">
                        <h3 class="font-weight-bold font-blue font-size-h3 mb-2">Мое идеально будущее</h3>
                        @foreach($questionnaireResult->perfectFuture as $value)
                            <div class="font-size-h6 my-2 text-break">{{ $value }}</div>
                        @endforeach
                    </div>

                    <div class="mt-5">
                        <h3 class="font-weight-bold font-blue font-size-h3 mb-2">Отношение к заключению договора целевого обучения с работодателем</h3>
                        <p class="font-size-h6 text-dark text-break">{{ $questionnaireResult->concludingContractTargetedTraining }}</p>
                    </div>

                    <div class="mt-5">
                        <h3 class="font-weight-bold font-blue font-size-h3 mb-2">Вероятность, что я останусь в родном городе</h3>
                        <div class="max-w-md-400px mt-5">
                            <div class="text-dark font-weight-bold font-size-h5 text-center font-blue text-break">{{ $questionnaireResult->chancesOfStayingHometown['value'] }}</div>
                            <div class="progress mb-4 bg-transparent my-3" style="position: relative; width: 100%; height: 18px">
                                <div class="progress-bar rounded-pill bg-blue" role="progressbar" style="width: {{ $questionnaireResult->chancesOfStayingHometown['progress'] }}%; z-index: 2;"></div>
                                <div class="progress-bar bg-dark progress__bg-line" role="progressbar" style="width: 100%"></div>
                            </div>
                            <div class="row w-100 no-gutters">
                                <div class="col-6">1</div>
                                <div class="col-6 text-right">10</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 my-4">
                    <h3 class="font-weight-bold font-blue font-size-h3 mb-2">Выбор экзаменов для ЕГЭ</h3>
                    <div class="font-size-h6 my-2 text-break">
                        {{ $questionnaireResult->chosenExams }}
                    </div>

                    <div class="mt-5">
                        <h3 class="font-weight-bold font-blue font-size-h3 mb-2">Интересно получать предложения от работодателей об экскурсиях, подготовительных курсах, целевом обучении, стажировках</h3>
                        <p class="font-size-h6 text-dark text-break">{{ $questionnaireResult->receiveOffersFromTheEmployer }}</p>
                    </div>

                    <div class="mt-5">
                        <h3 class="font-weight-bold text-primary font-size-h3">На текущий момент проявлена</h3>
                        <p class="font-size-h6 text-dark text-break">{{ $questionnaireResult->willingness_to_choose_profession_label }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
