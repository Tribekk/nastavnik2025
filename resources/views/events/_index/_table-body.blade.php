<tbody class="datatable-body">
@foreach($events as $index => $item)
    <tr class="font-size-lg">
        <td class="fit">
            {{ $events->firstItem() + $index }}
        </td>

        <td>
            <a href="{{ route('employer.events.edit', $item) }}" class="font-weight-bold link">{{ $item->title }}</a>
        </td>

        <td>
            @foreach($item->directions as $direction)
                <div>{{ $direction->direction->title }}</div>
            @endforeach
        </td>

        <td>
            {{ $item->format->title }}
        </td>

        <td class="text-nowrap">
            <span class="{{ $item->state->color() }}">{{ $item->state->title() }}</span>
        </td>

        <td class="fit" style="vertical-align: middle;">
            <div class=" text-primary mb-0">{{ $item->start_at->format('d.m.Y H:i') }}</div>
        </td>

        <td class="fit" style="vertical-align: middle;">
            <div class=" text-primary mb-0">{{ $item->finish_at->format('d.m.Y H:i') }}</div>
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
