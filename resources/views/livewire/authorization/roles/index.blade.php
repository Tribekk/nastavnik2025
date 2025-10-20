<div>
    <x-tables.filters without-actions>
        @include('admin.authorization.roles._index._search')
    </x-tables.filters>

    <x-card>
        <x-slot name="title">{{ __('Роли') }}</x-slot>
        <x-slot name="toolbar">
            <x-inputs.button-link link="{{ route('admin.roles.create') }}" title="{{ __('Новая роль') }}" icon="la-plus"/>
        </x-slot>

        @if ($roles->count() > 0)
            @include('admin.authorization.roles._index._table')
        @else
            <x-tables.empty-alert text="{{ __('По вашему запросу не найдено ни одной роли.') }}"></x-tables.empty-alert>
        @endif
    </x-card>
</div>

@push('scripts')
    <script type="text/javascript">

        document.addEventListener('DOMContentLoaded', function () {
        @this.on('delete-role', $id => {
            Swal.fire({
                title: 'Вы действительно хотите удалить роль?',
                showCancelButton: true,
                confirmButtonColor: 'var(--success)',
                cancelButtonColor: 'var(--primary)',
                confirmButtonText: 'Удалить',
                cancelButtonText: 'Отмена'
            }).then((result) => {
                if (result.value) {
                @this.call('delete', $id);
                }
            });
        });
        })
    </script>
@endpush
