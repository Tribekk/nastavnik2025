<h3 class="font-weight-bold text-primary font-size-h1 mb-5 mt-8">Образ будущего и мотивы выбора</h3>
<div class="row">
    <div class="col-md-8 my-4">
        <h3 class="font-weight-bold font-blue font-size-h3 mb-2">Мне больше подходит</h3>
        <p class="font-size-h6 text-dark text-break">{{ $questionnaireResult->suitsMeBetter }}</p>

        <div class="mt-8">
            <h3 class="font-weight-bold font-blue font-size-h3 mb-2">Мое идеально будущее</h3>
            @foreach($questionnaireResult->perfectFuture as $value)
                <div class="font-size-h6 my-2 text-break">{{ $value }}</div>
            @endforeach
        </div>

        <div class="mt-8">
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
    <div class="col-md-4 my-4">
        <h3 class="font-weight-bold font-blue font-size-h3 mb-2">Отношение к заключению договора целевого обучения с работодателем</h3>
        <p class="font-size-h6 text-dark text-break">{{ $questionnaireResult->concludingContractTargetedTraining }}</p>

        <div class="mt-8">
            <h3 class="font-weight-bold font-blue font-size-h3 mb-2">Интересно получать предложения от работодателей об экскурсиях, подготовительных курсах, целевом обучении, стажировках</h3>
            <p class="font-size-h6 text-dark text-break">{{ $questionnaireResult->receiveOffersFromTheEmployer }}</p>
        </div>
    </div>

    <div class="col-md-8 my-4">
        <h3 class="font-weight-bold font-blue font-size-h3 mb-2">Ради этого я буду работать</h3>
        @include('quiz._result-student-questionnaire._result_factor_motive_of_choice', ['progressColor' => 'bg-blue', 'textColor' => 'font-blue'])
    </div>
    <div class="col-md-4 my-4">
        <h3 class="font-weight-bold font-blue font-size-h3 mb-2">При выборе работы мне важно</h3>
        @foreach($questionnaireResult->importantWhenChoosingJob as $value)
            <div class="font-size-h6 my-2 text-break">{{ $value }}</div>
        @endforeach

        <div class="mt-8">
            <h3 class="font-weight-bold text-primary font-size-h3">На текущий момент проявлена</h3>
            <p class="font-size-h6 text-dark text-break">{{ $questionnaireResult->willingness_to_choose_profession_label }}</p>
        </div>
    </div>
</div>
