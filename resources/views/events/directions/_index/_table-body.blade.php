<tbody class="datatable-body">
@foreach($directions as $index => $item)
    <tr class="font-size-lg">
        <td class="fit">
            {{ $directions->firstItem() + $index }}
        </td>

        <td>
            <a href="{{ route('employer.events.directions.edit', $item) }}" class="font-weight-bold link">{{ $item->title }}</a>
        </td>

        <td class="fit" style="vertical-align: middle;">
            <div class=" text-primary mb-0">{{ $item->created_at->format('d.m.Y') }}</div>
        </td>

        <td class="fit" style="vertical-align: middle;">
            <div class=" text-primary mb-0">{{ $item->updated_at->format('d.m.Y') }}</div>
        </td>

    </tr>
@endforeach
</tbody>
