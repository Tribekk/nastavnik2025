<tbody class="datatable-body">
@foreach($registrations as $index => $registration)
    <tr class="font-size-lg">
        <td class="fit">
            {{ $registrations->firstItem() + $index  }}
        </td>

        <td class="fit">
            {{ (new \Illuminate\Support\Carbon($registration->date))->format('d.m.Y') }}
        </td>

        <td class="fit">
            {{ $registration->count }}
        </td>
    </tr>
@endforeach
</tbody>
