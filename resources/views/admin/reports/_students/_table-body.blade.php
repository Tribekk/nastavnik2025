<tbody class="datatable-body">
@foreach($users as $index => $user)
    @php
        $parent = null;
        $observer = $user->observers()->first();
        if($observer) {
            $parent = $observer->user;
        }
    @endphp


    @php
        $consultation = $user->consultations()->orderBy('consultations.created_at')->first();
    @endphp


    <tr class="font-size-lg">
        <td class="fit">
            {{ $users->firstItem() + $index }}
        </td>

        <td>
            <div class="d-flex align-items-center min-w-150px max-w-150px">
                <div class="symbol symbol-40 symbol-sm flex-shrink-0 d-none d-md-block">
                    <img src="{{ $user->avatarUrl }}">
                </div>
                <div class="ml-4">
                    <a href="{{ route('admin.users.edit', $user) }}" class="text-dark text-hover-primary font-weight-bolder mb-0">
                        {{ $user->fullName }}
                    </a>
                </div>
            </div>
        </td>
        <td>
            <div class="max-w-150px min-w-100px">
                {{ optional($user->school)->short_title ?? 'компания не указана' }}, @if($user->class) {{ $user->class->number }}{{ $user->class->letter }} @else структурное подразделение не указано @endif
            </div>
        </td>

        <td>
            @if($user->phone)
                <div class="link cursor-pointer" onclick="$.sendSmsDialog('{{ $user->phone }}')">{{ $user->phone }}</div>
            @else
                <i class="la la-minus text-muted"></i>
            @endif
        </td>

        <td>
            @if($user->email)
                <a target="_blank" class="link cursor-pointer" href="mailto:{{$user->email}}">{{ $user->email }}</a>
            @else
                <i class="la la-minus text-muted"></i>
            @endif
        </td>


        <td class="text-nowrap">
            @if($user->finishedBaseTests && $parent)
                <div class="text-success">Выполнен базовый этап</div>
            @else
                @if(!$user->studentQuestionnaireFinished) <div class="text-primary">Нет анкеты</div> @endif
                @if(!$parent) <div class="text-primary">Не прикреплены родители</div> @endif
                @if($user->countNotFinishedBaseTests)<div class="text-primary">Нет базового теста</div> @endif
            @endif
        </td>

        <td>
            @if($user->hasDepthTests())
                @if($user->finishedDepthTests)
                    <span class="text-success">{{ $user->sex == 1 ? 'Прошел' : 'Прошла' }}</span>
                @else
                    <span class="text-muted">{{ $user->sex == 1 ? 'Приглашен' : 'Приглашена' }}</span>
                @endif
            @else
                @if($user->finishedBaseTests)
                    <form action="{{ route('employer.students.invite.depth_test', $user) }}" class="w-125px" method="post">
                        @csrf
                        <button class="btn btn-success">
                            <i class="la la-plus"></i>
                            пригласить
                        </button>
                    </form>
                @else
                    <i class="la la-minus text-muted"></i>
                @endif
            @endif
        </td>

        <td class="text-nowrap">
            @if($consultation)
                @if($consultation->state->is(\Domain\Consultation\States\CarriedOutConsultationState::class))
                    <div class="text-success">{{ $user->sex == 1 ? 'Прошел консультацию' : 'Прошла консультацию' }}</div>
                @else
                    <div class="text-muted">{{ $user->sex == 1 ? 'Приглашен' : 'Приглашена' }}</div>
                @endif

                @if($consultation->result)
                    @if($consultation->result->recommend == 'recommend')
                        <div class="text-success">{{ $user->sex == 1 ? 'Рекомендован' : 'Рекомендована' }}</div>
                    @else
                        <div class="text-primary">{{ $user->sex == 1 ? 'Не рекомендован' : 'Не рекомендована' }}</div>
                    @endif
                @endif
            @else
                <i class="la la-minus text-muted"></i>
            @endif
        </td>

        <td>
            @if($parent)
                <div class="d-flex align-items-center min-w-150px max-w-150px">
                    <div class="symbol symbol-40 symbol-sm flex-shrink-0 d-none d-md-block">
                        <img src="{{ $parent->avatarUrl }}">
                    </div>
                    <div class="ml-4">
                        <a href="{{ route('admin.users.edit', $parent) }}" class="text-dark text-hover-primary font-weight-bolder mb-0">
                            {{ $parent->fullName }}
                        </a>
                    </div>
                </div>
            @else
                <i class="la la-minus text-muted"></i>
            @endif
        </td>

        <td>
            @if($parent && $parent->phone)
                <div class="link cursor-pointer" onclick="$.sendSmsDialog('{{ $parent->phone }}')">{{ $parent->phone }}</div>
            @else
                <i class="la la-minus text-muted"></i>
            @endif
        </td>

        <td class="fit">
            @if($parent && $parent->parentQuestionnaireFinished)
                <i class="la la-check text-success"></i>
            @else
                <i class="la la-minus text-muted"></i>
            @endif
        </td>

        <td class="fit">
            @if($user->studentQuestionnaireFinished)
                <i class="la la-check text-success"></i>
            @else
                <i class="la la-minus text-muted"></i>
            @endif
        </td>
        <td class="fit">
            @if($user->characterTraitQuizFinished)
                <i class="la la-check text-success"></i>
            @else
                <i class="la la-minus text-muted"></i>
            @endif
        </td>
        <td class="fit">
            @if($user->interestsQuizFinished)
                <i class="la la-check text-success"></i>
            @else
                <i class="la la-minus text-muted"></i>
            @endif
        </td>
        <td class="fit">
            @if($user->suitableProfessionsQuizFinished)
                <i class="la la-check text-success"></i>
            @else
                <i class="la la-minus text-muted"></i>
            @endif
        </td>

        <td class="fit">
            @if($user->inclinationQuizFinished)
                <i class="la la-check text-success"></i>
            @else
                <i class="la la-minus text-muted"></i>
            @endif
        </td>

        <td class="fit">
            @if($user->intelligenceLevelQuizFinished)
                <i class="la la-check text-success"></i>
            @else
                <i class="la la-minus text-muted"></i>
            @endif
        </td>

        <td class="fit">
            @if($user->typeThinkingQuizFinished)
                <i class="la la-check text-success"></i>
            @else
                <i class="la la-minus text-muted"></i>
            @endif
        </td>

        <td class="fit">
            @if($user->solutionCasesQuizFinished)
                <i class="la la-check text-success"></i>
            @else
                <i class="la la-minus text-muted"></i>
            @endif
        </td>
    </tr>
@endforeach
</tbody>
