@extends('layout.page')

@section('subheader')
    <x-subheader title="Мои структурные подразделения"/>
@endsection

@section('content')
    <div class="d-flex flex-column-fluid">
        <div class="container">

            <div class="card card-custom gutter-b">
                <div class="card-body">
                    <div class="mt-3 d-flex flex-wrap">
                        <div class="flex-grow-1">
                            <h2 class="font-size-h2 font-weight-bold text-break">{{ $class->school->short_title ?? '-' }}. Структурное подразделение {{ $class->number }}{{ $class->letter }} (год: {{ $class->year ? $class->year : 'не указан' }})</h2>
                        </div>
                        <div class="w-md-325px w-100 justify-content-md-end d-flex mt-4 mt-md-0 mb-4 mb-md-0">
                            @if(Auth::user()->isTeacher || Auth::user()->isCurator)
                                <a href="{{ route('school.classes.list') }}" class="btn btn-success"><i class="la la-reply"></i>К списку структурных подразделений</a>
                                <a href="{{ route('school.classes.add_student_with_parent',['class' => $class->id]) }}" class="btn btn-success"><i class="la la-reply"></i>Добавить наставника и родителя</a>
                            @endif
                            <a href="{{ route('school.classes.show.table', $class) }}" class="ml-2  btn btn-outline-success"><i class="la la-th-list"></i>Табличный вид</a>
                        </div>
                    </div>
                </div>
            </div>

            @forelse($students as $student)
                <div class="card card-custom gutter-b">
                    <div class="card-body">
                        <div class="d-flex text-break">
                            <div class="flex-grow-1">
                                <div class="d-flex align-items-center justify-content-between flex-wrap">
                                    <div class="mr-3">
                                        <p class="d-flex align-items-center font-blue font-size-h1 font-weight-bold mr-3">
                                            {{ $student->fullName }}
                                        </p>

                                        <div class="d-flex flex-wrap my-2">
                                            @if($student->phone)
                                                <a href="tel:{{ unFormatPhone($student->phone) }}" class="text-muted text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                                    <i class="la la-phone mr-1"></i>
                                                    <span id="phone">{{ $student->phone }}</span>
                                                </a>
                                            @endif


                                            @if($student->email)
                                                <a href="mailto:{{ $student->email }}" class="text-muted text-hover-primary d-flex font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2 text-break">
                                                    <i class="la la-at mr-1"></i>
                                                    <span>{{ $student->email }}</span>
                                                </a>
                                            @endif

                                            @if($student->city)
                                                <span class="text-dark-50 font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                                    <i class="la la-location-arrow mr-1"></i>
                                                    {{ $student->city }}
                                                </span>
                                            @endif

                                            @if($student->birthDateFormatted)
                                                <span class="text-dark-50 font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                                    <i class="las la-birthday-cake mr-1"></i>
                                                    {{ $student->birthDateFormatted }}
                                                    @if($student->fullYears)
                                                        ({{ $student->fullYearsFormatted }})
                                                    @endif
                                                </span>
                                            @endif
                                        </div>
                                        <div class="d-flex flex-wrap font-size-h6 my-2">
                                            <span class="text-dark-50 font-weight-bold mr-3 mb-lg-0 mb-2">
                                                {{ $student->class->number }}{{ $student->class->letter}} (год: {{  $student->class->year ?  $student->class->year : 'не указан' }}),
                                            </span>
                                            <span class="text-dark-50  font-weight-bold mr-3 mb-lg-0 mb-2">{{ $student->school->short_title }}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="separator separator-solid my-7"></div>
                                <div class="mt-2 row">
                                    <div class="col-md-4 my-4">
                                        <div class="font-size-h4 font-weight-bold">Количество тестов (базовые + глубинные)</div>
                                        <span class="font-size-h5">{{ $student->availableQuizzes()->whereHas('quiz', function($q) { $q->where('type', 'test'); })->count() }}</span>
                                    </div>

                                    <div class="col-md-4 my-4">
                                        <div class="font-size-h4 font-weight-bold">Количество пройденных тестов</div>
                                        <span class="font-size-h5 text-success">{{ $student->countFinishedTests }}</span>
                                    </div>

                                    <div class="col-md-4 my-4">
                                        <div class="font-size-h4 font-weight-bold">Количество непройденных тестов</div>
                                        <span class="font-size-h5 text-primary">{{ ($student->availableQuizzes()->whereHas('quiz', function($q) { $q->where('type', 'test'); })->count() - $student->countFinishedTests) }}</span>
                                    </div>
                                    <div class="col-md-4 my-4">
                                        <div class="font-size-h4 font-weight-bold">Отметка заполнения анкеты</div>
                                        @if($student->studentQuestionnaireFinished)
                                            <span class="font-size-h5 text-success">Да</span>
                                            @else
                                            <span class="font-size-h5 text-primary">Нет</span>
                                        @endif
                                    </div>
                                    <div class="col-md-4 my-4">
                                        <div class="font-size-h4 font-weight-bold">Отметка прохождения базового теста</div>
                                        {!! $wrapper->studentBaseTestStatus($student) !!}
                                    </div>
                                    <div class="col-md-4 my-4">
                                        <div class="font-size-h4 font-weight-bold">Отметка прохождения глубинного теста</div>
                                        <div class="text-dark-50 font-size-h5">{{ $student->finishedDepthTests ? 'Пройден' : 'Не пройден' }}</div>
                                    </div>
                                    <div class="col-md-4 my-4">
                                        <div class="font-size-h4 font-weight-bold">Отметка получения консультации</div>
                                        @forelse($student->consultations as $consultation)
                                            <div class="text-dark-50 font-size-h5">{{ $consultation->FormattedStartAt }} - <span class="font-weight-bold {{ $consultation->state->color() }}">{{ mb_strtolower($consultation->state->title()) }}</span></div>
                                        @empty
                                            <div class="text-dark-50 font-size-h5">Записи на консультацию отсутствуют</div>
                                        @endforelse
                                    </div>
                                    <div class="col-md-4 my-4">
                                        <div class="font-size-h4 font-weight-bold">Общая оценка по итогам проекта</div>
                                        <div class="text-dark-50 font-size-h5">Наставник - <b>{{ optional($student->feedback)->mark ?? 'не указано' }}</b></div>
                                        @foreach($student->observers as $observer)
                                            <div class="text-dark-50 font-size-h5">Родитель ({{ $observer->user->fullName }}) - <b>{{ optional($observer->user->feedback)->mark ?? 'не указано' }}</b></div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="separator separator-solid my-7"></div>
                                <div class="mt-3 mb-5 font-size-h3 font-weight-bold text-primary">Информация о тестах</div>
                                <div class="row">
                                    @foreach($student->availableQuizzes as $availableQuiz)
                                        @if($availableQuiz->quiz->type == "test")
                                            <div class="col-md-4 my-4">
                                                <div class="font-size-h5 font-weight-bold">{{ $availableQuiz->quiz->title }}</div>
                                                <div class="font-size-h6 text-dark-50">{{ $availableQuiz->quiz->questionCount }} вопросов</div>

                                                @switch($availableQuiz->quiz->slug)
                                                    @case('traits')
                                                        <div class="font-size-h6 text-dark-50">{{ $student->characterTraitQuizFinished ? 'Пройден' : 'Не пройден' }}</div>
                                                    @break
                                                    @case('interests')
                                                        <div class="font-size-h6 text-dark-50">{{ $student->interestsQuizFinished ? 'Пройден' : 'Не пройден' }}</div>
                                                    @break
                                                    @case('suitable-professions')
                                                        <div class="font-size-h6 text-dark-50">{{ $student->suitableProfessionsQuizFinished ? 'Пройден' : 'Не пройден' }}</div>
                                                    @break
                                                    @case('inclinations')
                                                        <div class="font-size-h6 text-dark-50">{{ $student->inclinationQuizFinished ? 'Пройден' : 'Не пройден' }}</div>
                                                    @break
                                                    @case('intelligence-level')
                                                        <div class="font-size-h6 text-dark-50">{{ $student->intelligenceLevelQuizFinished ? 'Пройден' : 'Не пройден' }}</div>
                                                    @break
                                                    @case('type-of-thinking')
                                                        <div class="font-size-h6 text-dark-50">{{ $student->typeThinkingQuizFinished ? 'Пройден' : 'Не пройден' }}</div>
                                                    @break
                                                    @case('solution_of_cases')
                                                        <div class="font-size-h6 text-dark-50">{{ $student->solutionCasesQuizFinished ? 'Пройден' : 'Не пройден' }}</div>
                                                    @break
                                                @endswitch

                                                @if($availableQuiz->state->fillable())
                                                    <div class="text-dark-50 font-size-h6 mb-3">
                                                        Заполнено на {{ $availableQuiz->quiz->filledPercentage($student) }}%
                                                    </div>
                                                @else
                                                    <div class="text-dark-50 font-size-h6">
                                                        <small class="text-muted">{{ $availableQuiz->finished_at->format('d.m.Y') }}</small>
                                                    </div>
                                                @endif
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
{{--                                <div class="separator separator-solid my-7"></div>--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-md-4">--}}
{{--                                        <div class="mt-3 mb-5 font-size-h3 font-weight-bold text-primary">Портрет личности</div>--}}
{{--                                        @if($student->characterTraitQuizFinished)--}}
{{--                                            <div>--}}
{{--                                                @foreach($student->characterTraitResult->values as $value)--}}
{{--                                                    <div class="font-size-h6 {{ $value->is_higher ? 'text-warning' : 'font-alla' }}"><b>{{ $value->title }}</b> - {{ $value->percentage }}%</div>--}}
{{--                                                @endforeach--}}
{{--                                            </div>--}}
{{--                                        @else--}}
{{--                                            <span class="font-size-h6">Тест &laquo;Особенности характера&raquo; еще не пройден</span>--}}
{{--                                        @endif--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-4">--}}
{{--                                        <div class="mt-3 mb-5 font-size-h3 font-weight-bold text-primary">Выбор по матрице профессий</div>--}}
{{--                                        @if($student->suitableProfessionsQuizFinished)--}}
{{--                                            <div class="font-size-h6 font-weight-bold">--}}
{{--                                                "{{ $student->suitableProfessions->careerMatrix->activityObject->title }}" + "{{ $student->suitableProfessions->careerMatrix->activityKind->title }}"--}}
{{--                                            </div>--}}
{{--                                        @else--}}
{{--                                            <span class="font-size-h6">Тест &laquo;Подходящие профессии&raquo; еще не пройден</span>--}}
{{--                                        @endif--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-12">--}}
{{--                                        <div class="mt-3 mb-5 font-size-h3 font-weight-bold text-primary">Проф интересы и Рекомендуемые профессии (типаж)</div>--}}
{{--                                        @if($student->suitableProfessionsQuizFinished && $student->interestsQuizFinished)--}}
{{--                                            <div class="row">--}}
{{--                                                @forelse($student->personTypes() as $type)--}}
{{--                                                    <div class="col-md-3 font-size-h6 font-weight-bold my-4">--}}
{{--                                                        {{ $type->type->title }} <span class="font-weight-normal">({{ $type->value }})</span>--}}

{{--                                                        @foreach($type->type->professions as $profession)--}}
{{--                                                            <div class="my-2 font-weight-normal">{!! $profession->title !!}</div>--}}
{{--                                                        @endforeach--}}
{{--                                                    </div>--}}
{{--                                                    @empty--}}
{{--                                                    <div class="col-md-12">--}}
{{--                                                        <span class="font-size-h6">Тест &laquo;Интересы&raquo; и(или) &laquo;Подходящие профессии&raquo; еще не пройден(ы)</span>--}}
{{--                                                    </div>--}}
{{--                                                @endforelse--}}
{{--                                            </div>--}}
{{--                                        @else--}}
{{--                                            <span class="font-size-h6">Тест &laquo;Интересы&raquo; и(или) &laquo;Подходящие профессии&raquo; еще не пройден(ы)</span>--}}
{{--                                        @endif--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <x-alert type="info" text="На данный момент у структурного подразделения нет наставников" :close="false"></x-alert>
            @endforelse
        </div>
    </div>
@endsection
