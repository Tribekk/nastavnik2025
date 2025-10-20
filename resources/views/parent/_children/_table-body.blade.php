<tbody class="datatable-body">
<tr>
    <td>
        <span class="font-size-h5">
            Мое мнение
        </span>
    </td>

    @if($parent->parentQuestionnaireResult)
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
                <span class="font-size-h5">-</span>
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
    @else
        <td colspan="8">
            <div class="font-size-h5 font-weight-bold">
                Вы еще не заполнили анкету
            </div>
        </td>
    @endif
</tr>
@foreach($children as $child)
    @if($child->studentQuestionnaireResult)
        <tr>
            <td>
                <span class="font-size-h5">
                    {{ $child->fullName }}
                </span>
            </td>

            <!-- ребенок. ценности -->
            <td>
                @forelse($child->studentQuestionnaireResult->dominationValues as $value)
                    <div class="font-size-h5 my-2 text-break">{{ $value }}{{ $loop->last ? '.' : ';' }}</div>
                @empty
                    <span class="font-size-h5">-</span>
                @endforelse
            </td>

            <!-- ребенок. образ будущего -->
            <td>
                @forelse($child->studentQuestionnaireResult->perfectFuture as $value)
                    <div class="font-size-h5 my-2 text-break">{{ $value }}{{ $loop->last ? '.' : ';' }}</div>
                @empty
                    <span class="font-size-h5">-</span>
                @endforelse
            </td>

            <!-- ребенок. вероятность остаться в родном городе -->
            <td>
                <div class="font-size-h5 text-break">
                    {{ $child->studentQuestionnaireResult->chancesOfStayingHometown['value'] }}
                </div>
            </td>

            <!-- ребенок. мотивы выбора -->
            <td>
                @forelse($child->studentQuestionnaireResult->factorsChoseJob as $value)
                    <div class="font-size-h5 my-2 text-break">{{ $value }}{{ $loop->last ? '.' : ';' }}</div>
                @empty
                    <span class="font-size-h5">-</span>
                @endforelse
            </td>

            <!-- ребенок. отношение к целевому обучению -->
            <td>
                <span class="font-size-h5 text-break">
                    {{ $child->studentQuestionnaireResult->concludingContractTargetedTraining }}
                </span>
            </td>

            <!-- ребенок. интерес к получению предложений от работодателя -->
            <td>
                <span class="font-size-h5 text-break">
                    {{ $child->studentQuestionnaireResult->receiveOffersFromTheEmployer }}
                </span>
            </td>

            <!-- ребенок. оценка проекта -->
            <td>
                <span class="font-size-h5">
                    {{ optional($child->feedback)->mark ?? '-' }}
                </span>
            </td>
        </tr>
    @else
        <tr>
            <td>
                <span class="font-size-h5">
                    {{ $child->fullName }}
                </span>
            </td>
            <td colspan="8">
                <div class="font-size-h5 font-weight-bold">
                    Ребенок еще не заполнил анкету
                </div>
            </td>
        </tr>
    @endif
@endforeach
</tbody>
