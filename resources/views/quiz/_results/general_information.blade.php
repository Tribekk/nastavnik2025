<div class="row">
    <div class="col-md-4 my-4">
        <h3 class="font-weight-bold text-primary font-size-h3 mb-2">Мои увлечения</h3>
        @foreach($questionnaireResult->hobbies as $value)
            <div class="font-size-h6 my-2">
                {{ $value }}
            </div>
        @endforeach

        <div class="mt-5">
            <h3 class="font-weight-bold text-primary font-size-h3 mb-2">{{ $questionnaireResult->howLongHaveHobbies }}</h3>
        </div>
    </div>

    <div class="col-md-4 my-4">
        <h3 class="font-weight-bold text-primary font-size-h3 mb-2">Дополнительные занятия с репетитором</h3>
        @forelse($questionnaireResult->lessonsWithTutor as $value)
            <div class="font-size-h6 my-2">
                {{ $value }}
            </div>
        @empty
            <div class="font-size-h6 my-2">
                Не занимаюсь с репетитором
            </div>
        @endforelse

        <div class="mt-5">
            <h3 class="font-weight-bold text-primary font-size-h3 mb-2">Ограничивающие особенности здоровья</h3>
            @forelse($questionnaireResult->limitingHealthFeatures as $value)
                <div class="font-size-h6 my-2">
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
        <h3 class="font-weight-bold text-primary font-size-h3 mb-2">Опыт трудовой деятельности</h3>
        <p class="font-size-h6 my-2">
            {{ $questionnaireResult->workExperience }}
        </p>

        <div class="mt-5">
            <h3 class="font-weight-bold text-primary font-size-h3 mb-2">Выбор экзаменов для ЕГЭ</h3>
            <div class="font-size-h6 my-2">
                {{ $questionnaireResult->chosenExams }}
            </div>
        </div>
    </div>

    <div class="col-md-4 my-4">
        <h3 class="font-weight-bold font-orange font-size-h3 mb-2">Любимые предметы</h3>
        @foreach($questionnaireResult->favoriteSubjects as $value)
            <div class="font-size-h6 my-2">
                {{ $value }}
            </div>
        @endforeach

        <div class="mt-5">
            <h3 class="font-weight-bold font-orange font-size-h3 mb-2">Средний балл в компании</h3>
            <div class="font-size-h6 my-2">
                {{ $questionnaireResult->avgMark }}
            </div>
        </div>
    </div>

    <div class="col-md-4 my-4">
        <h3 class="font-weight-bold font-orange font-size-h3 mb-2">Мои личные качества</h3>
        @foreach($questionnaireResult->personalQualities as $value)
            <div class="font-size-h6 my-2">
                {{ $value }}
            </div>
        @endforeach

        <div class="mt-5">
            <h3 class="font-weight-bold font-orange font-size-h3 mb-2">Коротко обо мне</h3>
            @foreach($questionnaireResult->aboutMe as $value)
                <div class="font-size-h6 my-2">
                    {{ $value }}
                </div>
            @endforeach
        </div>
    </div>

    <div class="col-md-4 my-4">
        <h3 class="font-weight-bold font-orange font-size-h3 mb-2">Миллион потрачу на</h3>
        <p class="font-size-h6 my-2">{{ $questionnaireResult->willSpendMillionOn }}</p>

        @if($questionnaireResult->themeMyBlog)
            <div class="mt-5">
                <h3 class="font-weight-bold font-orange font-size-h3 mb-2">Свой блог в интернете посвящу теме</h3>
                    <div class="font-size-h6 my-2">
                        {{ $questionnaireResult->themeMyBlog }}
                    </div>
            </div>
        @endif

        @if($questionnaireResult->whoDoWantToWork)
            <div class="mt-5">
                <h3 class="font-weight-bold font-orange font-size-h3 mb-2">Я хочу работать</h3>
                <p class="font-size-h6 my-2">{{ $questionnaireResult->whoDoWantToWork }}</p>
            </div>
        @endif

        <div class="mt-5">
            <h3 class="font-weight-bold font-orange font-size-h3 mb-2">Я точно не буду работать</h3>
            <p class="font-size-h6 my-2">{{ $questionnaireResult->whoDontWantToWork }}</p>
        </div>

        <div class="mt-5">
            <h3 class="font-weight-bold font-orange font-size-h3 mb-2">Потому что</h3>
            <p class="font-size-h6 my-2">{{ $questionnaireResult->whyWhoDontWantToWork }}</p>
        </div>
    </div>
</div>
