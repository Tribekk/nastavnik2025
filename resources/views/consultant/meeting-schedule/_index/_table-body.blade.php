<tbody class="datatable-body">
@foreach($appointments as $index => $appointment)
    <tr>
        <td class="fit">
            {{ $appointments->firstItem() + $index }}
        </td>

        <td>
            {{ $appointment->dateFormatted }}
        </td>

        <td>
            {{ $appointment->interval->title }}
        </td>

        <td>
            <div class="actions d-flex text-center">

                <a href="{{ route('consultant.meeting_schedule.update_view', $appointment) }}" class="btn btn-sm btn-default btn-text-primary btn-hover-primary btn-icon mr-2">
                    <span class="svg-icon svg-icon-md"><i class="la la-pencil"></i></span>
                </a>

                <form action="{{ route('consultant.meeting_schedule.destroy', $appointment) }}" method="post">
                    @csrf
                    @method('delete')
                    <button onclick="return confirm('Вы действительно хотите удалить запись?')" class="btn btn-sm btn-default btn-text-primary btn-hover-primary btn-icon" title="{{ __('Удалить') }}">
                        <span class="svg-icon svg-icon-md"><i class="la la-remove"></i></span>
                    </button>
                </form>

            </div>
        </td>

    </tr>
@endforeach
</tbody>
