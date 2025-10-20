<tbody class="datatable-body">
@foreach($students as $index => $student)
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
            @forelse($student->studentQuestionnaireResult->favoriteSubjects as $subject)
                <div class="">{{ $subject }}{{ $loop->last ? '.' : ';' }}</div>
            @empty
                <div class="">-</div>
            @endforelse
        </td>

        <td>
            {{ $student->studentQuestionnaireResult->avgMark }}
        </td>

        <td class="min-w-250px">
            @forelse($student->studentQuestionnaireResult->perfectFuture as $value)
                <div class="">{{ $value }}{{ $loop->last ? '.' : ';' }}</div>
            @empty
                <div class="">-</div>
            @endforelse
        </td>

        <td>
            {{ $student->studentQuestionnaireResult->chancesOfStayingHometown['value'] ?? '-' }}
        </td>

        <td class="min-w-125px">
            @forelse($student->studentQuestionnaireResult->limitingHealthFeatures as $value)
                <div class="">{{ $value }}{{ $loop->last ? '.' : ';' }}</div>
            @empty
                <div class="">Ограничений нет</div>
            @endforelse
        </td>

        <td class="text-nowrap">
            @forelse($student->studentQuestionnaireResult->personalQualities as $value)
                <div class="">{{ $value }}{{ $loop->last ? '.' : ';' }}</div>
            @empty
                <div class="">-</div>
            @endforelse
        </td>

        <td class="text-nowrap">
            @forelse($student->studentQuestionnaireResult->motiveOfChoice as $value)
                <div class="">{{ $value }}{{ $loop->last ? '.' : ';' }}</div>
            @empty
                <div class="">-</div>
            @endforelse
        </td>

        <td class="min-w-200px">
            <div class="">
                {{ $student->studentQuestionnaireResult->concludingContractTargetedTraining }}
            </div>
        </td>

        <td class="min-w-200px">
            <div class="">
                {{ $student->studentQuestionnaireResult->willingness_to_choose_profession_label }}
                <span class="{{ $student->studentQuestionnaireResult->willingness_to_choose_profession_score >= 6 ? 'text-success' : 'font-alla' }}">
                    ({{ $student->studentQuestionnaireResult->willingness_to_choose_profession_score }} баллов)
                </span>
            </div>
        </td>

        <td class="text-nowrap">
            @forelse($student->professionalTypeResult->values()->where('value', '!=', 0)->get() as $value)
                <div class="">
                    {{ $value->type->title }} <span class="font-weight-normal">({{ $value->value }})</span>
                </div>
            @empty
                <div class="">Не выражено</div>
            @endforelse
        </td>

        <td>
            <div class="text-nowrap">
                @foreach($student->characterTraitResult->values as $value)
                    <div class="{{ $value->is_higher ? 'text-warning' : 'font-alla' }}"><b>{{ $value->title }}</b> - {{ $value->percentage }}%</div>
                @endforeach
            </div>
        </td>

        <td class="text-nowrap">
            @forelse($student->personTypes() as $type)
                <a href="#" class="font-weight-bold link" data-toggle="modal" data-target="#personType_{{ $student->id }}_{{$type->id}}">
                    {{ $type->type->title }} <span class="font-weight-normal">({{ $type->value }})</span>
                </a>
                <br>
                <!-- Modal-->
                <div class="modal fade" id="personType_{{ $student->id }}_{{$type->id}}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title font-size-h3 font-weight-bold" id="personType_{{ $student->id }}_{{$type->id}}">{{ $type->type->title }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <i aria-hidden="true" class="ki ki-close"></i>
                                </button>
                            </div>
                           <div class="modal-body">
                               <h4 class="font-size-h5 font-weight-bold mb-3">Рекомендуемые профессии:</h4>
                               <div class="font-size-h5">
                                   @foreach($type->type->professions as $profession)
                                       <div class="my-2 font-weight-normal text-nowrap">{!! $profession->title !!}</div>
                                   @endforeach
                               </div>

                               <div class="font-size-h5 font-weight-bold mt-3">Набрано: <span class="font-blue">{{ $type->value }} {{ num2word($type->value, ['балл', 'балла', 'баллов']) }}</span></div>
                           </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success" data-dismiss="modal">Закрыть</button>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="">Типаж не выражен</div>
            @endforelse
        </td>

        <td class="text-nowrap">
            "{{ $student->suitableProfessions->careerMatrix->activityObject->title }}" + "{{ $student->suitableProfessions->careerMatrix->activityKind->title }}"
        </td>

        <td class="fit">
            @if($student->hasDepthTests())
                <span class="">приглашен</span>
            @else
                <form action="{{ route('employer.students.invite.depth_test', $student) }}" method="post">
                    @csrf
                    <x-inputs.submit title="Пригласить"/>
                </form>
            @endif
        </td>
    </tr>
@endforeach
</tbody>
