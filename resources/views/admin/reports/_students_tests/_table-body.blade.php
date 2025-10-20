<tbody class="datatable-body">
@foreach($results as $index => $result)
    <tr class="font-size-lg">
        <td class="fit">
            {{ $index+1  }}
        </td>

        <td class="fit">
            <a href="{{ route('admin.reports.students', ['school_id' => $result->school_id]) }}" class="link">
                {{ $result->school }}
            </a>
        </td>

        <td class="fit">
            <a href="{{ route('admin.reports.students', ['school_id' => $result->school_id, 'class_id' => $result->class_id]) }}" class="link">
                {{ $result->class }}
            </a>
        </td>

        <td class="fit">
            {{ $result->finished_quizzes }}
        </td>

        <td class="fit">
            {{ $result->not_finished_quizzes }}
        </td>

        <td class="fit">
            {{ floor($result->finish_percentage) }}%
        </td>
    </tr>
@endforeach
</tbody>
