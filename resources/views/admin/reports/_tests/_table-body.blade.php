<tbody class="datatable-body">
@foreach($results as $index => $result)
    <tr class="font-size-lg">
        <td class="fit">
            {{ $index+1  }}
        </td>

        <td class="fit">
            {{ (new \Carbon\Carbon($result->date))->format('d.m.Y') }}
        </td>

        <td class="fit">
            {{ $result->ctr_count }}
        </td>

        <td class="fit">
            {{ $result->ptr_count }}
        </td>

        <td class="fit">
            {{ $result->spr_count }}
        </td>

        <td class="fit">
            {{ $result->ir_count }}
        </td>

        <td class="fit">
            {{ $result->ilr_count }}
        </td>

        <td class="fit">
            {{ $result->ttr_count }}
        </td>

        <td class="fit">
            {{ $result->scr_count }}
        </td>
    </tr>
@endforeach
</tbody>
