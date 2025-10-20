<div class="card-body">
    <div class="d-flex flex-sm-nowrap flex-wrap">
        <div class="mr-5 max-w-225px">
            <h3 class="w-225px bg-blue rounded-pill text-white py-4 px-8 font-weight-bold font-size-lg font-hero text-center">Анкетные данные</h3>
            <div class="mx-5 mt-7">
                <h4 class="text-uppercase font-blue font-size-h5 font-hero font-weight-bold">Обо мне</h4>
                <span class="text-dark-50 font-size-lg">Текущие общие сведения</span>
            </div>
        </div>
        <div class="separator separator-solid my-7 w-100 d-block d-sm-none"></div>
        <div class="ml-5 flex-grow-1">
            <div class="row">
                <div class="col-md-4 my-4">
                    <h3 class="font-weight-bold font-orange font-size-h3 mb-2">Любимые предметы</h3>
                    @foreach($questionnaireResult->favoriteSubjects as $value)
                        <div class="font-size-h6 my-2 text-break">
                            {{ $value }}
                        </div>
                    @endforeach

                    <div class="mt-5">
                        <h3 class="font-weight-bold font-orange font-size-h3 mb-2">Средний балл в компании</h3>
                        <div class="font-size-h6 my-2 text-break">
                            {{ $questionnaireResult->avgMark }}
                        </div>
                    </div>

                    <div class="mt-5">
                        <h3 class="font-weight-bold font-orange font-size-h3 mb-2">Мои увлечения</h3>
                        @foreach($questionnaireResult->hobbies as $value)
                            <div class="font-size-h6 my-2 text-break">
                                {{ $value }}
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-5">
                        <h3 class="font-weight-bold font-orange font-size-h3 mb-2">Занимаюсь в секции {{ $questionnaireResult->howLongHaveHobbies }}</h3>
                        <p class="font-size-h6 my-2 text-break">{{ $questionnaireResult->whoseChoiceHobbies }}</p>
                    </div>

                    <div class="mt-5">
                        <h3 class="font-weight-bold font-orange font-size-h3 mb-2">Дополнительные занятия с репетитором</h3>
                        @forelse($questionnaireResult->lessonsWithTutor as $value)
                            <div class="font-size-h6 my-2 text-break">
                                {{ $value }}
                            </div>
                        @empty
                            <div class="font-size-h6 my-2">
                                Не занимаюсь с репетитором
                            </div>
                        @endforelse
                    </div>

                    <div class="mt-5">
                        <h3 class="font-weight-bold font-orange font-size-h3 mb-2">Опыт трудовой деятельности</h3>
                        <p class="font-size-h6 my-2 text-break">
                            {{ $questionnaireResult->workExperience }}
                        </p>
                    </div>

                    <div class="mt-5">
                        <h3 class="font-weight-bold font-orange font-size-h3 mb-2">Ограничивающие особенности здоровья</h3>
                        @forelse($questionnaireResult->limitingHealthFeatures as $value)
                            <div class="font-size-h6 my-2 text-break">
                                {{ $value }}
                            </div>
                        @empty
                            <div class="font-size-h6 my-2">
                                Нет
                            </div>
                        @endforelse
                    </div>
                </div>
                <div class="col-md-4 my-4">
                    <h3 class="font-weight-bold font-orange font-size-h3 mb-2">Мои личные качества</h3>
                    @foreach($questionnaireResult->personalQualities as $value)
                        <div class="font-size-h6 my-2 text-break">
                            {{ $value }}
                        </div>
                    @endforeach

                    <div class="mt-5">
                        <h3 class="font-weight-bold font-orange font-size-h3 mb-2">Коротко обо мне</h3>
                        @foreach($questionnaireResult->aboutMe as $value)
                            <div class="font-size-h6 my-2 text-break">
                                {{ $value }}
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-4 my-4">
                    <h3 class="font-weight-bold font-orange font-size-h3 mb-2">Миллион потрачу на</h3>
                    <p class="font-size-h6 my-2 text-break">{{ $questionnaireResult->willSpendMillionOn }}</p>

                    @if($questionnaireResult->themeMyBlog)
                        <div class="mt-5">
                            <h3 class="font-weight-bold font-orange font-size-h3 mb-2">Свой блог в интернете посвящу теме</h3>
                            <div class="font-size-h6 my-2 text-break">
                                {{ $questionnaireResult->themeMyBlog }}
                            </div>
                        </div>
                    @endif

                    @if($questionnaireResult->whoDoWantToWork)
                        <div class="mt-5">
                            <h3 class="font-weight-bold font-orange font-size-h3 mb-2">Я хочу работать</h3>
                            <p class="font-size-h6 my-2 text-break">{{ $questionnaireResult->whoDoWantToWork }}</p>
                        </div>
                    @endif

                    <div class="mt-5">
                        <h3 class="font-weight-bold font-orange font-size-h3 mb-2">Я точно не буду работать</h3>
                        <p class="font-size-h6 my-2 text-break">{{ $questionnaireResult->whoDontWantToWork }}</p>
                    </div>

                    <div class="mt-5">
                        <h3 class="font-weight-bold font-orange font-size-h3 mb-2">Потому что</h3>
                        <p class="font-size-h6 my-2 text-break">{{ $questionnaireResult->whyWhoDontWantToWork }}</p>
                    </div>

                    <div class="mt-5">
                        <h3 class="font-weight-bold font-orange font-size-h3 mb-2">Мой жизненный девиз и его интерпретация</h3>
                        @foreach($questionnaireResult->lifeMottosAndInterpretations as $value)
                            <div class="font-size-h6 my-2 text-break">
                                <h4 class="font-weight-bold text-dark font-size-h6">{{ $value['title'] }}</h4>
                                @if($value['description']){{ $value['description'] }}@endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
