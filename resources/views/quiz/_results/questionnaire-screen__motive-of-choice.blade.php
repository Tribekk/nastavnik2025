<div class="card-body">
    <div class="d-flex flex-sm-nowrap flex-wrap">
        <div class="mr-5 max-w-225px">
            <h3 class="w-225px bg-blue rounded-pill text-white py-4 px-8 font-weight-bold font-size-lg font-hero text-center">Анкетные данные</h3>
            <div class="mx-5 mt-7">
                <h4 class="text-uppercase font-blue font-size-h5 font-hero font-weight-bold">Мотивы выбора</h4>
                <span class="text-dark-50 font-size-lg">Ключевые ориентиры любой деятельности</span>
            </div>
        </div>
        <div class="separator separator-solid my-7 w-100 d-block d-sm-none"></div>
        <div class="ml-5 flex-grow-1">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="font-weight-bold font-blue font-size-h3 mb-2">Я ценю в себе и людях</h3>
                    @foreach($questionnaireResult->valuesMeAndPeople as $value)
                        <div class="font-size-h6 my-2 text-break">
                            <b>{{ $value['title'] }}</b>
                            @if($value['description']) - {{ $value['description'] }}@endif
                        </div>
                    @endforeach
                </div>
                <div class="col-md-12 mt-8">
                    <h3 class="font-weight-bold font-blue font-size-h3 mb-2">При выборе работы мне важно</h3>
                    @foreach($questionnaireResult->importantWhenChoosingJob as $value)
                        <div class="font-size-h6 my-2 text-break">{{ $value }}</div>
                    @endforeach
                </div>

                <div class="col-md-12 mt-8">
                    <h3 class="font-weight-bold font-blue font-size-h3 mb-2">Ради этого я буду работать</h3>
                    @include('quiz._result-student-questionnaire._result_factor_motive_of_choice', ['progressColor' => 'bg-blue', 'textColor' => 'font-blue'])
                </div>
            </div>
        </div>
    </div>
</div>
