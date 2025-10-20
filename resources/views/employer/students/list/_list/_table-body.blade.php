<tbody class="datatable-body">

@foreach($students as $index => $student)
    @php

        //dd($student->hasDepthTests());
        $TypeOfThinkingResult = $QuizController->takeUserResults($student);

        //dd($TypeOfThinkingResult);
    @endphp
    <tr class="font-size-lg">
        <td class="fit">
            {{ $students->firstItem() + $index }}
        </td>

        <td class="w-min-225px">
            {{ $student->fullName }}
        </td>

        <td>
            {{ $student->birthDateFormatted }} @if($student->fullYears > 0) ({{ $student->fullYearsFormatted }}) @endif
        </td>

        <td class="fit">
            @if($student->school)
                <a href="{{ route('admin.reports.students', ['school_id' => $student->school_id]) }}" class="link">
                    {{ $student->school->short_title }}
                </a>
            @else
                не указана
            @endif
        </td>

        <td class="fit">
            @if($student->school && $student->class)
                <a href="{{ route('admin.reports.students', ['school_id' => $student->school_id, 'class_id' => $student->class_id]) }}" class="link">
                    {{ $student->class->number }}{{ $student->class->letter }}
                </a>
            @else
                не указан
            @endif
        </td>

        <td>
            @if($student->getTypeThinkingQuizFinishedAttribute(8))
                <div class="text-primary">Да</div>
            @else
                <div class="text-success">Нет</div>
            @endif
        </td>

        <td>
            @if($student->getTypeThinkingQuizFinishedAttribute(13))
                <div class="text-primary">Да</div>
            @else
                <div class="text-success">Нет</div>
            @endif
        </td>

        <td>
            @if($student->getTypeThinkingQuizFinishedAttribute(3))
                <div class="text-primary">Да</div>
            @else
                <div class="text-success">Нет</div>
            @endif
        </td>

        <td class="min-w-450px">
            <div class="row">
                <div class="col-md-12 order-1 order-md-0">
                    <div class="progress bg-transparent my-0" style="position: relative; width: 100%; height: 18px;line-height: 18px">
                        <div class="progress-bar rounded-pill" role="progressbar"
                             style="width: {{ $TypeOfThinkingResult['PersonalThinkingTypesAverage'] }}%;background-color: #FFFFFF;text-align: right"></div>
                        <div style="font-size: 18px;color:{{ $TypeOfThinkingResult['PersonalThinkingTypesAverageColor'] }};font-weight: bold">{{ $TypeOfThinkingResult['PersonalThinkingTypesAverage'] }}</div>
                    </div>

                    <div class="progress bg-transparent my-1" style="position: relative; width: 100%; height: 10px">
                        <div class="progress-bar rounded-pill" role="progressbar" style="width: 34%;background-color: #FF0000;border-radius: 0 !important;"></div>
                        <div class="progress-bar rounded-pill" role="progressbar" style="width: 36%;background-color: #FFD966;border-radius: 0 !important;"></div>
                        <div class="progress-bar rounded-pill" role="progressbar" style="width: 30%;background-color: #548235;border-radius: 0 !important;"></div>
                    </div>
                </div>
            </div>
            @foreach($TypeOfThinkingResult['PersonalThinkingTypes'] as $value)
                <div class="row">
                    <div class="col-md-3 order-1 order-md-0">
                        <div class="progress bg-transparent my-1" style="position: relative; width: 100%; height: 12px">
                            <div class="progress-bar rounded-pill" role="progressbar" style="width: {{ $value->percentage }}%;background-color: {{$value->hexColor()}}"></div>
                            <div class="progress-bar bg-dark progress__bg-line" role="progressbar" style="width: {{ 100 - $value->percentage }}%;height: 3px;align-self: center;"></div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        {{ $value->type->title }}
                    </div>
                </div>
            @endforeach
        </td>

        <td class="min-w-450px">
            <div class="row">
                <div class="col-md-12 order-1 order-md-0">
                    <div class="progress bg-transparent my-0" style="position: relative; width: 100%; height: 18px;line-height: 18px">
                        <div class="progress-bar rounded-pill" role="progressbar"
                             style="width: {{ $TypeOfThinkingResult['ProfessionalThinkingTypesAverage'] }}%;background-color: #FFFFFF;text-align: right"></div>
                        <div style="font-size: 18px;color:{{ $TypeOfThinkingResult['ProfessionalThinkingTypesAverageColor'] }};font-weight: bold">{{ $TypeOfThinkingResult['ProfessionalThinkingTypesAverage'] }}</div>
                    </div>

                    <div class="progress bg-transparent my-1" style="position: relative; width: 100%; height: 10px">
                        <div class="progress-bar rounded-pill" role="progressbar" style="width: 34%;background-color: #FF0000;border-radius: 0 !important;"></div>
                        <div class="progress-bar rounded-pill" role="progressbar" style="width: 36%;background-color: #FFD966;border-radius: 0 !important;"></div>
                        <div class="progress-bar rounded-pill" role="progressbar" style="width: 30%;background-color: #548235;border-radius: 0 !important;"></div>
                    </div>
                </div>
            </div>
            @foreach($TypeOfThinkingResult['ProfessionalThinkingTypes'] as $value)
                <div class="row">
                    <div class="col-md-3 order-1 order-md-0">
                        <div class="progress bg-transparent my-1" style="position: relative; width: 100%; height: 10px">
                            <div class="progress-bar rounded-pill" role="progressbar" style="width: {{ $value->percentage }}%;background-color: {{$value->hexColor()}}"></div>
                            <div class="progress-bar bg-dark progress__bg-line" role="progressbar" style="width: {{ 100 - $value->percentage }}%;height: 3px;align-self: center;"></div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        {{ $value->type->title }}
                    </div>
                </div>
            @endforeach
        </td>

        <td class="min-w-450px">
            <div class="row">
                <div class="col-md-12 order-1 order-md-0">
                    <div class="progress bg-transparent my-0" style="position: relative; width: 100%; height: 18px;line-height: 18px">
                        <div class="progress-bar rounded-pill" role="progressbar"
                             style="width: {{ $TypeOfThinkingResult['typeThinkingValuesEndAverage'] }}%;background-color: #FFFFFF;text-align: right"></div>
                        <div style="font-size: 18px;color:{{ $TypeOfThinkingResult['typeThinkingValuesEndAverageColor'] }};font-weight: bold">{{ $TypeOfThinkingResult['typeThinkingValuesEndAverage'] }}</div>
                    </div>

                    <div class="progress bg-transparent my-1" style="position: relative; width: 100%; height: 10px">
                        <div class="progress-bar rounded-pill" role="progressbar" style="width: 34%;background-color: #FF0000;border-radius: 0 !important;"></div>
                        <div class="progress-bar rounded-pill" role="progressbar" style="width: 36%;background-color: #FFD966;border-radius: 0 !important;"></div>
                        <div class="progress-bar rounded-pill" role="progressbar" style="width: 30%;background-color: #548235;border-radius: 0 !important;"></div>
                    </div>
                    <div>{{ $TypeOfThinkingResult['typeThinkingValuesEndAverageDesc'] }}</div>
                </div>
            </div>

        </td>

        <td class="text-nowrap">
            @if($student->studentQuestionnaireResult && $student->studentQuestionnaireResult->willingness_to_choose_profession_score)
                Анкета пройдена <a target="_blank" href="{{ route('quiz.user_results', $student->id)."#anketa" }}" data-toggle="tooltip" title="Просмотр анкеты" class="btn btn-success btn-icon btn-sm ml-3"><i class="la la-eye"></i></a>
                <br>

                <div class="order-1 order-md-0">
                    <div style="width: 100%; text-align: center; color: #2D38FC">{{ $student->studentQuestionnaireResult->willingness_to_choose_profession_score }}</div>

                    <div class="progress bg-transparent my-1" style="position: relative; width: 100%; height: 10px">
                        <div class="progress-bar rounded-pill" role="progressbar" style="width: {{ $student->studentQuestionnaireResult->willingness_to_choose_profession_score }}%;background-color: #2D38FC"></div>
                        <div class="progress-bar bg-dark progress__bg-line" role="progressbar" style="width: {{ 100 - $student->studentQuestionnaireResult->willingness_to_choose_profession_score }}%;height: 3px;align-self: center;"></div>
                    </div>
                </div>

            @else
                Анкета не пройдена
            @endif
{{--            @forelse($student->studentQuestionnaireResult->motiveOfChoice as $value)--}}
{{--                <div class="">{{ $value }}{{ $loop->last ? '.' : ';' }}</div>--}}
{{--            @empty--}}
{{--                <div class="">-</div>--}}
{{--            @endforelse--}}
        </td>

<!--        <td class="min-w-200px">-->
<!--            <div class="">-->
<!--{{--                {{ $student->studentQuestionnaireResult->concludingContractTargetedTraining }}--}}-->
<!--            </div>-->
<!--        </td>-->

<!--        <td class="min-w-200px">-->
<!--{{--            <div class="">--}}-->
<!--{{--                {{ $student->studentQuestionnaireResult->willingness_to_choose_profession_label }}--}}-->
<!--{{--                <span class="{{ $student->studentQuestionnaireResult->willingness_to_choose_profession_score >= 6 ? 'text-success' : 'font-alla' }}">--}}-->
<!--{{--                    ({{ $student->studentQuestionnaireResult->willingness_to_choose_profession_score }} баллов)--}}-->
<!--{{--                </span>--}}-->
<!--{{--            </div>--}}-->
<!--        </td>-->

<!--        <td class="text-nowrap">-->
<!--{{--            @forelse($student->professionalTypeResult->values()->where('value', '!=', 0)->get() as $value)--}}-->
<!--{{--                <div class="">--}}-->
<!--{{--                    {{ $value->type->title }} <span class="font-weight-normal">({{ $value->value }})</span>--}}-->
<!--{{--                </div>--}}-->
<!--{{--            @empty--}}-->
<!--{{--                <div class="">Не выражено</div>--}}-->
<!--{{--            @endforelse--}}-->
<!--        </td>-->

<!--        <td>-->
<!--            <div class="text-nowrap">-->
<!--{{--                @foreach($student->characterTraitResult->values as $value)--}}-->
<!--{{--                    <div class="{{ $value->is_higher ? 'text-warning' : 'font-alla' }}"><b>{{ $value->title }}</b> - {{ $value->percentage }}%</div>--}}-->
<!--{{--                @endforeach--}}-->
<!--            </div>-->
<!--        </td>-->

<!--        <td class="text-nowrap">-->
<!--            @forelse($student->personTypes() as $type)-->
<!--                <a href="#" class="font-weight-bold link" data-toggle="modal" data-target="#personType_{{ $student->id }}_{{$type->id}}">-->
<!--                    {{ $type->type->title }} <span class="font-weight-normal">({{ $type->value }})</span>-->
<!--                </a>-->
<!--                <br>-->
                <!-- Modal-->
<!--                <div class="modal fade" id="personType_{{ $student->id }}_{{$type->id}}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">-->
<!--                    <div class="modal-dialog modal-dialog-centered" role="document">-->
<!--                        <div class="modal-content">-->
<!--                            <div class="modal-header">-->
<!--                                <h5 class="modal-title font-size-h3 font-weight-bold" id="personType_{{ $student->id }}_{{$type->id}}">{{ $type->type->title }}</h5>-->
<!--                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
<!--                                    <i aria-hidden="true" class="ki ki-close"></i>-->
<!--                                </button>-->
<!--                            </div>-->
<!--                           <div class="modal-body">-->
<!--                               <h4 class="font-size-h5 font-weight-bold mb-3">Рекомендуемые профессии:</h4>-->
<!--                               <div class="font-size-h5">-->
<!--                                   @foreach($type->type->professions as $profession)-->
<!--                                       <div class="my-2 font-weight-normal text-nowrap">{!! $profession->title !!}</div>-->
<!--                                   @endforeach-->
<!--                               </div>-->

<!--                               <div class="font-size-h5 font-weight-bold mt-3">Набрано: <span class="font-blue">{{ $type->value }} {{ num2word($type->value, ['балл', 'балла', 'баллов']) }}</span></div>-->
<!--                           </div>-->
<!--                            <div class="modal-footer">-->
<!--                                <button type="button" class="btn btn-success" data-dismiss="modal">Закрыть</button>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            @empty-->
<!--                <div class="">Типаж не выражен</div>-->
<!--            @endforelse-->
<!--        </td>-->

<!--        <td class="text-nowrap">-->
<!--{{--            "{{ $student->suitableProfessions->careerMatrix->activityObject->title }}" + "{{ $student->suitableProfessions->careerMatrix->activityKind->title }}"--}}-->
<!--        </td>-->

<!--        <td class="fit">-->
<!--            @if($student->hasDepthTests())-->
<!--                @if($student->getFinishedDepthTestsAttribute())-->
<!--                    <span class="">Пройден</span>-->
<!--                @else-->
<!--                    <span class="">Не пройден</span>-->
<!--                @endif-->
<!--            @else-->
<!--                @if($QuizController->is_FinishTypeOfThinking($student))-->
<!--                <form action="{{ route('employer.students.invite.depth_test', $student) }}" method="post">-->
<!--                    @csrf-->
<!--                    <x-inputs.submit title="Пригласить"/>-->
<!--                </form>-->
<!--                @else-->
<!--                    <span>Базовый тур не пройден</span>-->
<!--                @endif-->
<!--            @endif-->
<!--        </td>-->
    </tr>
@endforeach
</tbody>
