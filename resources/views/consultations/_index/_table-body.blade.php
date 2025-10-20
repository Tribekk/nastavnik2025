<tbody class="datatable-body">
@foreach($consultations as $index => $consultation)
    <tr class="font-size-lg">
        <td class="fit">
            {{ $consultations->firstItem() + $index }}
        </td>

        <td>
            <span class="font-weight-bold">Ребенок:</span>
            {{ $consultation->child->fullName }}
            <br>
            <span class="font-weight-bold">Родитель:</span>
            {{ optional($consultation->parent)->fullName ?? 'не указан' }}
        </td>

        <td>
            {{ $consultation->consultant->fullName }}
        </td>

        <td>
            {{ $consultation->communication_type_value ? 'Отправлена' : 'Не отправлена' }}

            @if($consultation->communication_type_value)
                <br>
                <a href="{{ $consultation->communication_type_value }}" class="link" target="_blank">Ссылка</a>
            @endif
        </td>

        <td>
            {{ $consultation->appointment->dateFormatted }}
        </td>

        <td>
            {{ $consultation->interval->title }}
        </td>

        <td>
            <span class="text-nowrap {{ $consultation->state->color() }}">
                {{ $consultation->state->title() }}
            </span>
        </td>

        <td>
            <div class="actions d-flex text-center">
                @if(Auth::user()->hasAnyRole(['parent', 'student']) && !$consultation->state->is(\Domain\Consultation\States\CarriedOutConsultationState::class))
                    <a href="{{ route('consultations.show', $consultation) }}" class="btn btn-sm btn-default btn-text-primary btn-hover-primary btn-icon mr-2" title="{{ __('Просмотр') }}">
                        <span class="svg-icon svg-icon-md"><i class="la la-eye"></i></span>
                    </a>
                @endif

                @if(Auth::user()->hasAnyRole(['parent', 'student']) && $consultation->state->is(\Domain\Consultation\States\CarriedOutConsultationState::class))
                    <a href="{{ route('consultations.show', $consultation) }}" class="btn btn-sm btn-default btn-text-primary btn-hover-primary btn-icon mr-2" title="{{ __('Обратная связь') }}">
                        <span class="svg-icon svg-icon-md"><i class="la la-comments"></i></span>
                    </a>
                @endif

                @if(Auth::user()->hasAnyRole(['consultant']))
                    <a href="{{ route('consultations.edit', $consultation) }}" class="btn btn-sm btn-default btn-text-primary btn-hover-primary btn-icon mr-2" title="{{ __('Просмотр') }}">
                        <span class="svg-icon svg-icon-md"><i class="la {{ $consultation->state->code() == 'not-verified' ? 'la-eye' : 'la-pencil'}}"></i></span>
                    </a>
                @endif

                @if(Auth::user()->hasAnyRole(['parent', 'consultant']) || Auth::user()->isStudent && !$consultation->parent_id)
                    <form action="{{ route('consultations.destroy', $consultation) }}" method="post">
                        @csrf
                        @method('delete')
                        <button onclick="return confirm('Вы действительно хотите удалить консультацию на {{ $consultation->formattedStartAt }}?')" class="btn btn-sm btn-default btn-text-primary btn-hover-primary btn-icon" title="{{ __('Удалить') }}">
                            <span class="svg-icon svg-icon-md"><i class="la la-remove"></i></span>
                        </button>
                    </form>
                @endif
            </div>
        </td>

    </tr>
@endforeach
</tbody>
