<tbody class="datatable-body">
<tr>
    <td>
        <span class="font-size-h5">
            Мое мнение
        </span>
    </td>

    <!-- ребенок. ценности -->
    <td>
        @forelse($user->studentQuestionnaireResult->dominationValues as $value)
            <div class="font-size-h5 my-2 text-break">{{ $value }}{{ $loop->last ? '.' : ';' }}</div>
        @empty
            <span class="font-size-h5">-</span>
        @endforelse
    </td>

    <!-- ребенок. образ будущего -->
    <td>
        @forelse($user->studentQuestionnaireResult->perfectFuture as $value)
            <div class="font-size-h5 my-2 text-break">{{ $value }}{{ $loop->last ? '.' : ';' }}</div>
        @empty
            <span class="font-size-h5">-</span>
        @endforelse
    </td>

    <!-- ребенок. вероятность остаться в родном городе -->
    <td>
        <div class="font-size-h5 text-break">
            {{ $user->studentQuestionnaireResult->chancesOfStayingHometown['value'] }}
        </div>
    </td>

    <!-- ребенок. мотивы выбора -->
    <td>
        @forelse($user->studentQuestionnaireResult->factorsChoseJob as $value)
            <div class="font-size-h5 my-2 text-break">{{ $value }}{{ $loop->last ? '.' : ';' }}</div>
        @empty
            <span class="font-size-h5">-</span>
        @endforelse
    </td>

    <!-- ребенок. отношение к целевому обучению -->
    <td>
        <span class="font-size-h5 text-break">
            {{ $user->studentQuestionnaireResult->concludingContractTargetedTraining }}
        </span>
    </td>

    <!-- ребенок. интерес к получению предложений от работодателя -->
    <td>
        <span class="font-size-h5 text-break">
            {{ $user->studentQuestionnaireResult->receiveOffersFromTheEmployer }}
        </span>
    </td>

    <!-- ребенок. оценка проекта -->
    <td>
        <span class="font-size-h5">
            {{ optional($user->feedback)->mark ?? '-' }}
        </span>
    </td>
</tr>

@forelse($parents as $parent)
    @if($parent->parentQuestionnaireResult)
            <tr>
            <td>
                <span class="font-size-h5">
                    Родитель<br>
                    {{ $parent->fullName }}
                </span>
            </td>

            <!-- родитель. ценности -->
            <td>
                @forelse($parent->parentQuestionnaireResult->dominationValues as $value)
                    <div class="font-size-h5 my-2 text-break">{{ $value }}{{ $loop->last ? '.' : ';' }}</div>
                @empty
                    <span class="font-size-h5">-</span>
                @endforelse
            </td>

            <!-- родитель. образ будущего -->
            <td>
                @forelse($parent->parentQuestionnaireResult->imagineFeature as $value)
                    <div class="font-size-h5 my-2 text-break">{{ $value }}{{ $loop->last ? '.' : ';' }}</div>
                @empty
                    <span class="font-size-h5">-</span>
                @endforelse
            </td>

            <!-- родитель. вероятность что останется строить карьеру -->
            <td>
                <span class="font-size-h5 text-break">{{ $parent->parentQuestionnaireResult->probabilityWillRemain }}</span>
            </td>

            <!-- родитель. мотивы выбора -->
            <td>
                @forelse($parent->parentQuestionnaireResult->factorsChoseJob as $value)
                    <div class="font-size-h5 my-2 text-break">{{ $value }}{{ $loop->last ? '.' : ';' }}</div>
                @empty
                    <span class="font-size-h5 text-break">-</span>
                @endforelse
            </td>

            <!-- родитель. отношение к целевому обучению -->
            <td>
                <span class="font-size-h5 text-break">{{ $parent->parentQuestionnaireResult->targetedTraining }}</span>
            </td>

            <!-- родитель. интерес к получению информации о мероприятиях -->
            <td>
                <span class="font-size-h5 text-break">{{ $parent->parentQuestionnaireResult->receivingProposalsForEvents }}</span>
            </td>

            <!-- родитель. оценка проекта -->
            <td>
                <span class="font-size-h5">
                    {{ optional($parent->feedback)->mark ?? '-' }}
                </span>
            </td>
        </tr>
    @else
        <tr>
            <td>
                <span class="font-size-h5">
                    Родитель<br>
                    {{ $parent->fullName }}
                </span>
            </td>
            <td colspan="8">
                <div class="font-size-h5 font-weight-bold">
                     Еще не заполнил анкету
                </div>
            </td>
        </tr>
    @endif
@empty
    <tr>
        <td>
            <span class="font-size-h5">
                Мнение родителя
            </span>
        </td>
        <td colspan="8">
            <div class="font-size-h5 font-weight-bold">
                Родитель не привязан к аккаунту
            </div>
        </td>
    </tr>
@endforelse
</tbody>
