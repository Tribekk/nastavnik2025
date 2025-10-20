<tbody class="datatable-body">
@foreach($roles as $role)
    <tr class="font-size-lg">
        <td class="fit">
            {{ $role->id }}
        </td>

        <td>
            <a href="{{ route('admin.roles.edit', $role) }}" class="text-dark-75 text-hover-primary font-weight-bolder mb-0">
                {{ $role->title }}
            </a>
            <div class="text-muted font-weight-bold">{{ __('Код') }}: {{ $role->name }}</div>
        </td>

        <td>
            {{ $role->description }}
        </td>

        <td>
            {{ $role->guard_name }}
        </td>

        <td class="fit">
            <div class="font-weight-bolder text-primary mb-0">{{ $role->created_at->format('d.m.Y H:i:s') }}</div>
        </td>

        <td class="fit">
            <div class="font-weight-bolder text-primary mb-0">{{ $role->updated_at->format('d.m.Y H:i:s') }}</div>
        </td>

        <td>
            <div class="actions d-flex text-center">

            <a href="{{ route('admin.roles.permissions', $role) }}" class="btn btn-sm btn-default btn-text-primary btn-hover-primary btn-icon mr-2">
                <span class="svg-icon svg-icon-md"><i class="la la-pencil"></i></span>
            </a>

            <button wire:click="$emit('delete-role', {{ $role->id }})" class="btn btn-sm btn-default btn-text-primary btn-hover-primary btn-icon" title="{{ __('Удалить') }}">
                <span class="svg-icon svg-icon-md"><i class="la la-remove"></i></span>
            </button>

            </div>
        </td>
    </tr>
@endforeach
</tbody>
