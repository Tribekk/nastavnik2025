<tbody class="datatable-body">
@foreach($permissions as $permission)
    <tr class="font-size-lg">
        <td class="fit">
            {{ $permission->id }}
        </td>

        <td>
            <span class="text-dark-75 text-hover-primary font-weight-bolder mb-0">
                {{ $permission->title }}
            </span>
            <div class="text-muted font-weight-bold">{{ __('Код') }}: {{ $permission->name }}</div>
        </td>

        <td class="fit">
            {{ $permission->guard_name }}
        </td>

        <td class="fit">
            <div class="font-weight-bolder text-primary mb-0">{{ $permission->created_at->format('d.m.Y H:i:s') }}</div>
        </td>
    </tr>
@endforeach
</tbody>
