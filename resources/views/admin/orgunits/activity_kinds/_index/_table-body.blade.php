<tbody class="datatable-body">
@foreach($activityKinds as $index => $activityKind)
    <tr class="font-size-lg">
        <td class="fit">
            {{ $activityKinds->firstItem() + $index }}
        </td>

        <td>
            <div class="d-flex align-items-center">
                <div class="ml-4">
                    <a href="{{ route('admin.orgunits.activity_kinds.edit', $activityKind) }}" class="font-weight-bolder link">
                        {{ $activityKind->title }}
                    </a>
                </div>
            </div>
        </td>

        <td class="" style="vertical-align: middle;">
            @if($activityKind->disabled_at)
                <div class="text-primary mb-0">Нет, с:<br>{{ (new \Carbon\Carbon($activityKind->disabled_at))->format('d.m.Y') }}</div>
            @else
                <div class="text-success mb-0">Да</div>
            @endif
        </td>

        <td class="fit" style="vertical-align: middle;">
            <div class=" text-primary mb-0">{{ $activityKind->created_at->format('d.m.Y') }}</div>
        </td>

        <td class="fit" style="vertical-align: middle;">
            <div class=" text-primary mb-0">{{ $activityKind->updated_at->format('d.m.Y') }}</div>
        </td>

    </tr>
@endforeach
</tbody>
