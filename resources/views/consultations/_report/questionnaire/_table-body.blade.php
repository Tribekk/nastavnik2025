<tbody class="datatable-body">
<tr>
    @if($consultation->parent)
        <td>
            <span class="font-size-h5">
                <span class="font-weight-bold">Мнение родителя</span><br>
                {{ $consultation->parent->fullName }}
            </span>
        </td>

        @if($consultation->parent->parentQuestionnaireResult)
            <!-- родитель. ценности -->
            <td>
                @forelse($consultation->parent->parentQuestionnaireResult->dominationValues as $value)
                    <div class="font-size-h5 my-2 text-break">{{ $value }}{{ $loop->last ? '.' : ';' }}</div>
                @empty
                    <span class="font-size-h5">-</span>
                @endforelse
            </td>

            <!-- родитель. образ будущего -->
            <td>
                @forelse($consultation->parent->parentQuestionnaireResult->imagineFeature as $value)
                    <div class="font-size-h5 my-2 text-break">{{ $value }}{{ $loop->last ? '.' : ';' }}</div>
                @empty
                    <span class="font-size-h5">-</span>
                @endforelse
            </td>

            <!-- родитель. вероятность что останется строить карьеру -->
            <td>
                <span class="font-size-h5 text-break">{{ $consultation->parent->parentQuestionnaireResult->probabilityWillRemain }}</span>
            </td>

            <!-- родитель. мотивы выбора -->
            <td>
                @forelse($consultation->parent->parentQuestionnaireResult->factorsChoseJob as $value)
                    <div class="font-size-h5 my-2 text-break">{{ $value }}{{ $loop->last ? '.' : ';' }}</div>
                @empty
                    <span class="font-size-h5">-</span>
                @endforelse
            </td>

            <!-- родитель. отношение к целевому обучению -->
            <td>
                <span class="font-size-h5 text-break">{{ $consultation->parent->parentQuestionnaireResult->targetedTraining }}</span>
            </td>

            <!-- родитель. интерес к получению информации о мероприятиях -->
            <td>
                <span class="font-size-h5 text-break">{{ $consultation->parent->parentQuestionnaireResult->receivingProposalsForEvents }}</span>
            </td>

            <!-- родитель. оценка проекта -->
            <td>
                <span class="font-size-h5">
                    {{ optional($consultation->parent->feedback)->mark ?? '-' }}
                </span>
            </td>
        @else
            <td colspan="8">
                <div class="font-size-h5 font-weight-bold">
                    Вы еще не заполнили анкету
                </div>
            </td>
        @endif
    @endif
</tr>

<!-- ребенок -->
<tr>
    <td>
        <span class="font-size-h5">
            <span class="font-weight-bold">Мнение ребенка</span><br>
            {{ $consultation->child->fullName }}
        </span>
    </td>

    <!-- ребенок. ценности -->
    <td>
        @forelse($consultation->child->studentQuestionnaireResult->dominationValues as $value)
            <div class="font-size-h5 my-2 text-break">{{ $value }}{{ $loop->last ? '.' : ';' }}</div>
        @empty
            <span class="font-size-h5">-</span>
        @endforelse
    </td>

    <!-- ребенок. образ будущего -->
    <td>
        @forelse($consultation->child->studentQuestionnaireResult->perfectFuture as $value)
            <div class="font-size-h5 my-2 text-break">{{ $value }}{{ $loop->last ? '.' : ';' }}</div>
        @empty
            <span class="font-size-h5">-</span>
        @endforelse
    </td>

    <!-- ребенок. вероятность остаться в родном городе -->
    <td>
        <div class="font-size-h5 text-break">
            {{ $consultation->child->studentQuestionnaireResult->chancesOfStayingHometown['value'] }}
        </div>
    </td>

    <!-- ребенок. мотивы выбора -->
    <td>
        @forelse($consultation->child->studentQuestionnaireResult->factorsChoseJob as $value)
            <div class="font-size-h5 my-2 text-break">{{ $value }}{{ $loop->last ? '.' : ';' }}</div>
        @empty
            <span class="font-size-h5">-</span>
        @endforelse
    </td>

    <!-- ребенок. отношение к целевому обучению -->
    <td>
        <span class="font-size-h5 text-break">
            {{ $consultation->child->studentQuestionnaireResult->concludingContractTargetedTraining }}
        </span>
    </td>

    <!-- ребенок. интерес к получению предложений от работодателя -->
    <td>
        <span class="font-size-h5 text-break">
            {{ $consultation->child->studentQuestionnaireResult->receiveOffersFromTheEmployer }}
        </span>
    </td>

    <!-- ребенок. оценка проекта -->
    <td>
        <span class="font-size-h5">
            {{ optional($consultation->child->feedback)->mark ?? '-' }}
        </span>
    </td>
</tr>
</tbody>
