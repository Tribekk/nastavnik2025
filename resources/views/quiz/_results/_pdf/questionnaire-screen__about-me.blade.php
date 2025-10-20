<div class="screen">
    <div class="content">
        <div style="width: 225px; padding-right: 30px; display: inline-block">
            <h3 class="font-hero font-size-h5 pill pill__blue" style="margin-bottom: 10px; height: 40px; line-height: 25px; border-radius: 20px">Анкетные данные</h3>
            <div style="margin-left: 10px">
                <h4 class="text-blue font-hero font-weight-bold m-0">ОБО МНЕ</h4>
                <span class="text-dark-50">Текущие общие сведения</span>
            </div>
        </div>
        <div style="display: inline-block; width: 700px; float: right;">
            <div style="width: 220px; display: inline-block; vertical-align: top; word-wrap: break-word; white-space: pre-line;">
                <h3 class="font-weight-bold text-orange font-size-h4 mb-2">Любимые предметы</h3>
                @foreach($questionnaireResult->favoriteSubjects as $value)
                    <div class="" style="word-wrap: break-word;">
                        {{ $value }}
                    </div>
                @endforeach

                <div class="mt-4">
                    <h3 class="font-weight-bold text-orange font-size-h4 mb-2">Средний балл в компании</h3>
                    <div class="" style="word-wrap: break-word;">
                        {{ $questionnaireResult->avgMark }}
                    </div>
                </div>

                <div class="mt-4">
                    <h3 class="font-weight-bold text-orange font-size-h4 mb-2">Мои увлечения</h3>
                    @foreach($questionnaireResult->hobbies as $value)
                        <div class="" style="word-wrap: break-word;">
                            {{ $value }}
                        </div>
                    @endforeach
                </div>

                <div class="mt-5">
                    <h3 class="font-weight-bold text-orange font-size-h4 mb-2">Занимаюсь в секции {{ $questionnaireResult->howLongHaveHobbies }}</h3>
                    <div class="" style="word-wrap: break-word;">{{ $questionnaireResult->whoseChoiceHobbies }}</div>
                </div>

                <div class="mt-5">
                    <h3 class="font-weight-bold text-orange font-size-h3 mb-2">Дополнительные занятия с репетитором</h3>
                    @forelse($questionnaireResult->lessonsWithTutor as $value)
                        <div class="" style="word-wrap: break-word;">
                            {{ $value }}
                        </div>
                    @empty
                        <div class="">
                            Не занимаюсь с репетитором
                        </div>
                    @endforelse
                </div>

                <div class="mt-5">
                    <h3 class="font-weight-bold text-orange font-size-h4 mb-2">Опыт трудовой деятельности</h3>
                    <div class="" style="word-wrap: break-word;">{{ $questionnaireResult->workExperience }}</div>
                </div>

                <div class="mt-5">
                    <h3 class="font-weight-bold text-orange font-size-h4 mb-2">Ограничивающие особенности здоровья</h3>
                    @forelse($questionnaireResult->limitingHealthFeatures as $value)
                        <div class="" style="word-wrap: break-word;">
                            {{ $value }}
                        </div>
                    @empty
                        <div class="">
                            Нет
                        </div>
                    @endforelse
                </div>
            </div>
            <div style="width: 220px; display: inline-block; vertical-align: top; word-wrap: break-word; white-space: pre-line;">
                <h3 class="font-weight-bold text-orange font-size-h4 mb-2">Мои личные качества</h3>
                @foreach($questionnaireResult->personalQualities as $value)
                    <div class="" style="word-wrap: break-word;">
                        {{ $value }}
                    </div>
                @endforeach

                <div class="mt-5">
                    <h3 class="font-weight-bold text-orange font-size-h4 mb-2">Коротко обо мне</h3>
                    @foreach($questionnaireResult->aboutMe as $value)
                        <div class="" style="word-wrap: break-word;">
                            {{ $value }}
                        </div>
                    @endforeach
                </div>
            </div>
            <div style="width: 220px; display: inline-block; vertical-align: top; word-wrap: break-word; white-space: pre-line;">
                <h3 class="font-weight-bold text-orange font-size-h4 mb-2">Миллион потрачу на</h3>
                <div class="" style="word-wrap: break-word;">{{ $questionnaireResult->willSpendMillionOn }}</div>

                @if($questionnaireResult->themeMyBlog)
                    <div class="mt-5">
                        <h3 class="font-weight-bold text-orange font-size-h4 mb-2">Свой блог в интернете посвящу теме</h3>
                        <div class="" style="word-wrap: break-word;">
                            {{ $questionnaireResult->themeMyBlog }}
                        </div>
                    </div>
                @endif

                @if($questionnaireResult->whoDoWantToWork)
                    <div class="mt-5">
                        <h3 class="font-weight-bold text-orange font-size-h4 mb-2">Я хочу работать</h3>
                        <div class="" style="word-wrap: break-word;">{{ $questionnaireResult->whoDoWantToWork }}</div>
                    </div>
                @endif

                <div class="mt-5">
                    <h3 class="font-weight-bold text-orange font-size-h4 mb-2">Я точно не буду работать</h3>
                    <div class="" style="word-wrap: break-word;">{{ $questionnaireResult->whoDontWantToWork }}</div>
                </div>

                <div class="mt-5">
                    <h3 class="font-weight-bold text-orange font-size-h4 mb-2">Потому что</h3>
                    <div class="" style="word-wrap: break-word;">{{ $questionnaireResult->whyWhoDontWantToWork }}</div>
                </div>

                <div class="mt-5">
                    <h3 class="font-weight-bold text-orange font-size-h4 mb-2">Мой жизненный девиз и его интерпретация</h3>
                    @foreach($questionnaireResult->lifeMottosAndInterpretations as $value)
                        <div class="" style="word-wrap: break-word;">
                            <h4 class="font-weight-bold text-dark">{{ $value['title'] }}</h4>
                            @if($value['description']){{ $value['description'] }}@endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
