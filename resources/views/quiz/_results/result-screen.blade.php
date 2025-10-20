<div class="card-body" id="traits">
    <div class="d-flex flex-sm-nowrap flex-wrap">
        <div class="mr-5 max-w-225px">
            <h3 class="w-225px bg-orange rounded-pill text-white py-4 px-8 font-weight-bold font-size-lg font-hero text-center">Итог</h3>
        </div>
        <div class="separator separator-solid my-7 w-100 d-block d-sm-none"></div>
        <div class="ml-5 flex-grow-1">
            <div>
                <h3 class="font-size-h3 font-weight-bold font-orange">Ориентируйтесь на эти сферы интересов</h3>

                @foreach($professionalTypes as $type)

                    @php $value = $professionalTypeResult->values->where('type_id', $type->id)->first() @endphp

                    <div class="row mt-8">
                        <div class="col-sm-6 col-md-7 order-1 order-sm-0">
                            <div class="progress mt-3">
                                <div class="progress-bar bg-{{ $value->color }}" role="progressbar" style="width: {{ $value->percentage ?? 0 }}%" aria-valuenow="{{ $value->percentage ?? 0 }}" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-5 order-sm-1 order-0">
                            <div class="font-size-lg">
                                <a class="link" href="{{ route('quiz.type-details', [$professionalTypesQuiz, $type, 'backTo' => backResultsUrl('interests', $user->id)]) }}">
                                    {{ $type->area }}
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-25">
                <h3 class="font-size-h3 font-weight-bold font-orange">Доминирующие черты</h3>

                <div class="row">
                    <div class="col-md-12">
                        <div class="row justify-content-center">
                            <div class="col-lg-9 col-12">
                                @include('quiz._percentage')
                            </div>
                        </div>
                        @foreach($characterTraitResultValues as $value)
                            <div class="row mt-8">
                                <div class="col-lg-3 col-6 order-0">
                                    <h4 class="trait-font-size">
                                        @unless($value->is_higher)
                                            <a href="{{ route('quiz.trait-details', ['availableQuiz' => $traitsQuiz, 'trait' => $value->trait, 'backTo' => backResultsUrl('traits', $user->id)]) }}">
                                        <span class="font-hero-super font-alla">
                                            {{ $value->trait->lower_value }}
                                        </span>
                                            </a>
                                        @else
                                            <span class="font-grey-light">
                                        {{ $value->trait->lower_value }}
                                    </span>
                                        @endunless
                                    </h4>
                                </div>
                                <div class="col-lg-6 align-self-center order-3 order-lg-2">
                                    <div class="progress">
                                        @if($value->is_higher)
                                            <div class="progress-bar bg-secondary" role="progressbar" style="width: 50%"></div>
                                            <div class="progress-bar {{ $characterTraitWrapper->bootstrapClassName($value->is_higher) }}" role="progressbar" style="width: {{ $value->chart_percentage }}%"></div>
                                            <div class="progress-bar bg-secondary" role="progressbar" style="width: {{ 50 - $value->chart_percentage }}%"></div>
                                        @else
                                            <div class="progress-bar bg-secondary" role="progressbar" style="width: {{ 50 - $value->chart_percentage }}%"></div>
                                            <div class="progress-bar {{ $characterTraitWrapper->bootstrapClassName($value->is_higher) }}" role="progressbar" style="width: {{ $value->chart_percentage }}%"></div>
                                            <div class="progress-bar bg-secondary" role="progressbar" style="width: 50%"></div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-3 col-6 order-1 order-lg-3 text-right text-lg-left">
                                    <h4 class="trait-font-size">
                                        @if($value->is_higher)
                                            <a href="{{ route('quiz.trait-details', ['availableQuiz' => $traitsQuiz, 'trait' => $value->trait, 'backTo' => backResultsUrl('traits', $user->id)]) }}">
                                        <span class="font-hero-super font-orange">
                                            {{ $value->trait->higher_value }}
                                        </span>
                                            </a>
                                        @else
                                            <span class="font-grey-light">
                                        {{ $value->trait->higher_value }}
                                    </span>
                                        @endif
                                    </h4>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <h3 class="font-size-h3 font-weight-bold font-orange mt-15">Достоверность результатов интересы + черты характера</h3>

            <div class="row">
                <div class="col">
                    <div>
                        <span class="font-hero-super font-blue">Полученные результаты достоверны на</span> <span class="font-size-h2 font-hero-super font-alla">{{ $resultWrapper->bothReliabilityPercentage() }}%</span>
                    </div>
                    <div class="font-size-lg mt-2">
                        {{ $resultWrapper->bothReliabilityDescription() }}
                    </div>
                </div>
            </div>

            <div class="mt-15">
                <h3 class="font-weight-bold font-blue font-size-h3">Выбраны профессии</h3>
                <p class="font-size-h6 text-dark font-weight-bold">"{{ $suitableProfessionMatrix->activityObject->title }}" + "{{ $suitableProfessionMatrix->activityKind->title }}"</p>
            </div>

            <div class="mt-8">
                <h3 class="font-size-h3 font-weight-bold font-orange mb-3">Мотивы выбора</h3>
                @include('quiz._result-student-questionnaire._result_factor_motive_of_choice', ['progressColor' => 'bg-blue', 'textColor' => 'font-blue'])
            </div>
            <div class="mt-8">
                <h3 class="font-weight-bold font-blue font-size-h3">На текущий момент проявлена</h3>
                <p class="font-size-h6 text-dark">{{ $questionnaireResult->willingness_to_choose_profession_label }}</p>
            </div>
        </div>
    </div>
</div>
