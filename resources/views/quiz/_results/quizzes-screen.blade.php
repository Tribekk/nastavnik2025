<div class="card-body">
    <div class="container">
        <h3 class="font-pixel text-dark-50 font-size-lg mb-40 text-center">Отчет {{ $depthTestsFinished ? 'полного ' : 'базового' }} профориентационного тестирования</h3>

        <div class="row justify-content-center text-center text-md-left align-items-end align-items-md-start">
            <div class="{{ $depthTestsFinished ? 'col-lg-4' : '' }} col-md-6">
                <div class="d-flex justify-content-md-start justify-content-center">
                    <div class="text-center {{ $depthTestsFinished ? 'w-100' : 'w-50' }}">
{{--                        <img src="{{ asset('img/boy.png') }}" alt="Анкета" style="height: 150px; top: 15px; position: relative;">--}}
                        <span class="font-size-h3 font-hero mb-12 bg-blue p-5 text-center border-radius rounded-pill d-block text-white">Анкета</span>
                    </div>
                </div>

                <div class="my-4">
                    <h4 class="font-size-h3 font-hero-super font-blue text-uppercase mb-0">
                        О тебе
                    </h4>
                    <p class="text-dark font-size-h4">
                        Текущие общие сведения
                    </p>
                </div>

                <div class="my-4">
                    <h4 class="font-size-h3 font-hero-super font-blue text-uppercase mb-0">
                        Готовность к выбору
                    </h4>
                    <p class="text-dark font-size-h4">
                        Карьерные предпочтения и образ будущего
                    </p>
                </div>

                <div class="my-4">
                    <h4 class="font-size-h3 font-hero-super font-blue text-uppercase mb-0">
                        Мотивы выбора
                    </h4>
                    <p class="text-dark font-size-h4">
                        Ключевые ориентиры любой деятельности
                    </p>
                </div>
            </div>
            <div class="{{ $depthTestsFinished ? 'col-lg-4 text-lg-center' : '' }} col-md-6 text-md-right">
                <div class="d-flex justify-content-md-end justify-content-center">
                    <div class="text-center {{ $depthTestsFinished ? 'w-100' : 'w-50' }}">
                        @if(!$depthTestsFinished)
{{--                            <img src="{{ asset('img/girl_with_skate.png') }}" alt="Тест &laquo;Образ Я&raquo;" style="height: 150px; top: 15px; position: relative; transform: scaleX(-1)">--}}
                        @else
{{--                            <div class="h-md-150px"></div>--}}
                        @endif
                        <span class="font-size-h3 font-hero mb-12 bg-orange p-5 text-center border-radius rounded-pill d-block text-white">Профессиональные характеристики</span>
                    </div>
                </div>

                <div class="my-4">
                    <h4 class="font-size-h3 font-hero-super font-orange text-uppercase mb-0">
                        Особенности характера
                    </h4>
                    <p class="text-dark font-size-h4">
                        Структурированный портрет личности
                    </p>
                </div>

                <div class="my-4">
                    <h4 class="font-size-h3 font-hero-super font-orange text-uppercase mb-0">
                        Интересы
                    </h4>
                    <p class="text-dark font-size-h4">
                        Направления будущей деятельности
                    </p>
                </div>

                <div class="my-4">
                    <h4 class="font-size-h3 font-hero-super font-orange text-uppercase mb-0">
                        Подходящие профессии
                    </h4>
                    <p class="text-dark font-size-h4">
                        Варианты выбора
                    </p>
                </div>
            </div>
            @if($depthTestsFinished)
                <div class="col-lg-4 text-lg-right col-md-6 text-center">
                    <div class="d-flex justify-content-md-start justify-content-center">
                        <div class="text-center w-100">
{{--                            <img src="{{ asset('img/girl_with_skate.png') }}" alt="Тест &laquo;Образ Я&raquo;" style="height: 150px; top: 15px; right: -40px; position: relative; transform: scaleX(-1)">--}}
                            <span class="font-size-h3 font-hero mb-12 bg-alla p-5 text-center border-radius rounded-pill d-block text-white">Углубленный тест</span>
                        </div>
                    </div>

                    <div class="my-4">
                        <h4 class="font-size-h3 font-hero-super font-alla text-uppercase mb-0">
                            Склонности
                        </h4>
                        <p class="text-dark font-size-h4">
                            Профессиональные предпочтения
                        </p>
                    </div>

                    <div class="my-4">
                        <h4 class="font-size-h3 font-hero-super font-alla text-uppercase mb-0">
                            Общий уровень интеллекта
                        </h4>
                        <p class="text-dark font-size-h4">
                            Способности, восприятие информации,
                            уровень абстрактно-логического мышления
                        </p>
                    </div>

                    <div class="my-4">
                        <h4 class="font-size-h3 font-hero-super font-alla text-uppercase mb-0">
                            Тип мышления
                        </h4>
                        <p class="text-dark font-size-h4">
                            Эффективный способ преобразования
                            информации, коммуникаций и решения
                            задач
                        </p>
                    </div>
                    <div class="my-4">
                        <h4 class="font-size-h3 font-hero-super font-alla text-uppercase mb-0">
                            Решение кейсов
                        </h4>
                        <p class="text-dark font-size-h4">
                            Аспекты мотивации, самооценка,
                            отношение к делу, взаимодействие в
                            команде
                        </p>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
