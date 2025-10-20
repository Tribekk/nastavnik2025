<tbody class="datatable-body">
@foreach($students as $index => $student)
    <tr>
        <td class="fit">
            {{ $index + 1 }}
        </td>

        <td>
            <span class="font-size-h5">{{ $student->fullName }}</span>
        </td>

        <td>
            <span class="font-size-h5">{{ $student->birthDateFormatted }} @if($student->fullYears > 0) ({{ $student->fullYearsFormatted }}) @endif</span>
        </td>

        <td>
            @if($student->studentQuestionnaireFinished)
                <span class="font-size-h5 text-success">Да</span>
            @else
                <span class="font-size-h5 text-primary">Нет</span>
            @endif
        </td>

        <td class="">
            {!! $wrapper->studentBaseTestStatus($student) !!}
        </td>

        <td>
            @if($student->suitableProfessionsQuizFinished && $student->interestsQuizFinished)
                @forelse($student->personTypes() as $type)
                    <a href="#" class="font-size-h5 link text-nowrap" data-toggle="modal" data-target="#personType_{{ $student->id }}_{{$type->id}}">
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
                    <div class="col-md-12">
                        <div class="font-size-h6 min-w-250px">Типаж не выражен</div>
                    </div>
                @endforelse
            @else
                <div class="font-size-h6 min-w-250px">Тест &laquo;Интересы&raquo; и(или) &laquo;Подходящие профессии&raquo; еще не пройден(ы)</div>
            @endif
        </td>

        <td>
            @if($student->characterTraitQuizFinished)
                <div class="text-nowrap">
                    @foreach($student->characterTraitResult->values as $value)
                        <div class="font-size-h6 {{ $value->is_higher ? 'text-warning' : 'font-alla' }}"><b>{{ $value->title }}</b> - {{ $value->percentage }}%</div>
                    @endforeach
                </div>
            @else
                <div class="font-size-h6 min-w-250px">Тест &laquo;Особенности характера&raquo; еще не пройден</div>
            @endif
        </td>

        <td>
            @if($student->suitableProfessionsQuizFinished)
                <div class="font-size-h6 font-weight-bold text-nowrap">
                    "{{ $student->suitableProfessions->careerMatrix->activityObject->title }}" + "{{ $student->suitableProfessions->careerMatrix->activityKind->title }}"
                </div>
            @else
                <div class="font-size-h6 min-w-250px">Тест &laquo;Подходящие профессии&raquo; еще не пройден</div>
            @endif
        </td>

        <td>
            <div class="font-size-h5">{{ $student->finishedDepthTests ? 'Пройден' : 'Не пройден' }}</div>
        </td>

        <td>
            <div class="font-size-h5">{{ $student->hasDepthTests() ? 'Приглашен' : 'Не приглашен' }}</div>
        </td>

        <td>
            <div class="font-size-h5">{{ $student->observers ? 'Да' : 'Нет' }}</div>
        </td>

        <td class="text-nowrap">
            @forelse($student->consultations as $consultation)
                <div class="font-size-h5">{{ $consultation->FormattedStartAt }} - <span class="font-weight-bold {{ $consultation->state->color() }}">{{ mb_strtolower($consultation->state->title()) }}</span></div>
            @empty
                <div class="font-size-h5">Записи на консультацию отсутствуют</div>
            @endforelse
        </td>

        <td>
            <div class="font-size-h5 text-nowrap">Наставник - <b>{{ optional($student->feedback)->mark ?? 'не указано' }}</b></div>
            @foreach($student->observers as $observer)
                <div class="font-size-h5 text-nowrap">Родитель ({{ $observer->user->fullName }}) - <b>{{ optional($observer->user->feedback)->mark ?? 'не указано' }}</b></div>
            @endforeach
        </td>
    </tr>
@endforeach
</tbody>
