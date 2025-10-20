<tbody class="datatable-body">
@foreach($events as $index => $item)
    <tr class="font-size-lg">
        <td class="fit">
            {{ $events->firstItem() + $index }}
        </td>

        <td>
            <a href="{{ route('events.show', $item) }}" class="font-weight-bold link">{{ $item->event->title }}</a>
        </td>

        <td>
            @foreach($item->event->directions as $direction)
                <div>{{ $direction->direction->title }}</div>
            @endforeach
        </td>

        <td>
            {{ $item->event->format->title }}
        </td>

        <td class="text-nowrap">
            <span class="{{ $item->eventState->color() }}">{{ $item->eventState->title() }}</span>
        </td>

        <td class="fit" style="vertical-align: middle;">
            <div class=" text-primary mb-0">{{ $item->event->start_at->format('d.m.Y H:i') }}</div>
        </td>

        <td class="fit" style="vertical-align: middle;">
            <div class=" text-primary mb-0">{{ $item->event->finish_at->format('d.m.Y H:i') }}</div>
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
