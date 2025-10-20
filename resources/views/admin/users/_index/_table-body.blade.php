<tbody class="datatable-body">
@foreach($users as $index => $user)
    <tr class="font-size-lg">
        <td class="fit">
            {{ $users->firstItem() + $index }}
        </td>

        <td>
            <div class="d-flex align-items-center">
                <div class="symbol symbol-40 symbol-sm flex-shrink-0 d-none d-md-block">
                    <img src="{{ $user->avatarUrl }}">
                </div>
                <div class="ml-4">
                    <a href="{{ route('admin.users.edit', $user) }}" class="font-weight-bolder link">
                        {{ $user->fullName }}
                    </a>
                    <div class="font-weight-bold {{  $user->roles->count() > 0 ? 'text-primary' : 'text-muted' }}">{{ __('Роли') }}: {{ $user->rolesAsString }}</div>
                </div>
            </div>
        </td>

        <td class="text-center" style="vertical-align: middle;">
            @if($user->isAdmin)
                <i class="la la-check text-success"></i>
            @else
                <i class="la la-minus text-muted"></i>
            @endif
        </td>

        <td class="fit" style="vertical-align: middle;">
            <div class=" text-primary mb-0">{{ $user->created_at->format('d.m.Y') }}<br/>{{ $user->created_at->format('H:i:s') }}</div>
        </td>

        <td class="fit" style="vertical-align: middle;">
            <div class=" text-primary mb-0">{{ $user->updated_at->format('d.m.Y') }}<br/>{{ $user->updated_at->format('H:i:s') }}</div>
        </td>

    </tr>
@endforeach
</tbody>
