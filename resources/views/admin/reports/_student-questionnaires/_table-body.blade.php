<tbody class="datatable-body">
@foreach($questionnaires as $index => $questionnaire)
    <tr class="font-size-lg">
        <td class="fit">
            {{ $questionnaires->firstItem() + $index  }}
        </td>

        <td class="fit">
            {{ (new \Illuminate\Support\Carbon($questionnaire->date))->format('d.m.Y') }}
        </td>

        <td class="fit">
            {{ $questionnaire->count }}
        </td>
    </tr>
@endforeach
</tbody>
