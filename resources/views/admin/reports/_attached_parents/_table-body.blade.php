<tbody class="datatable-body">
@foreach($results as $index => $result)
    <tr class="font-size-lg">
        <td class="fit">
            {{ $results->firstItem() + $index  }}
        </td>

        <td class="fit">
            {{ (new \Illuminate\Support\Carbon($result->date))->format('d.m.Y') }}
        </td>

        <td class="fit">
            {{ $result->count }}
        </td>
    </tr>
@endforeach
</tbody>
