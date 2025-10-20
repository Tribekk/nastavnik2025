<div x-data="{ selectRole: false, selectPermission: false }">
    <div class="row">
        <div class="col-xl-3"></div>
        <div class="col-xl-7 my-2">

            <div class="d-flex justify-content-between">
                <div>
                    <h3 class="font-weight-bolder text-primary font-size-h4 font-size-h1-lg">{{ __('Роли и разрешения') }}</h3>
                </div>
            </div>

            <ul class="nav nav-tabs nav-tabs-line" wire:ignore>
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#select-roles">{{ __('Роли') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#select-permissions">{{ __('Разрешения') }}</a>
                </li>
            </ul>
            <div class="tab-content mt-5" id="myTabContent">
                <div class="tab-pane fade show active" id="select-roles" role="tabpanel" wire:ignore.self>
                    @include('admin.users._edit._user_roles')
                </div>
                <div class="tab-pane fade" id="select-permissions" role="tabpanel" wire:ignore.self>
                    @include('admin.users._edit._user-permissions')
                </div>
            </div>

        </div>
    </div>

</div>

@push('scripts')
    <script>
        $(document).ready(function () {
            $('#role_id').select2({
                placeholder: '{{ __('Выберите роль') }}',
                ajax: {
                    url: '/admin/authorization/roles',
                    dataType: 'json',
                    data: function (params) {
                        var query = {
                            q: params.term,
                        }
                        return query;
                    },
                    processResults: function (response) {
                        return {
                            results: response.data
                        };
                    }
                }
            });
            $('#role_id').on('change', function (e) {
                @this.set('roleId', e.target.value);
            });

            $('#permission_id').select2({
                placeholder: '{{ __('Выберите разрешение') }}',
                ajax: {
                    url: '/admin/authorization/permissions/json',
                    dataType: 'json',
                    data: function (params) {
                        var query = {
                            q: params.term,
                        }
                        return query;
                    },
                    processResults: function (response) {
                        return {
                            results: response.data
                        };
                    }
                }
            });
            $('#permission_id').on('change', function (e) {
                @this.set('permissionId', e.target.value);
            });
        });

        document.addEventListener('DOMContentLoaded', function () {
            @this.on('remove-role', $id => {
                Swal.fire({
                    title: 'Вы действительно хотите удалить роль?',
                    showCancelButton: true,
                    confirmButtonColor: 'var(--success)',
                    cancelButtonColor: 'var(--primary)',
                    confirmButtonText: 'Удалить',
                    cancelButtonText: 'Отмена'
                }).then((result) => {
                    if (result.value) {
                        @this.call('removeRole', $id);
                    }
                });
            });

            @this.on('revoke-permission', $id => {
                Swal.fire({
                    title: 'Вы действительно хотите отозвать разрешение?',
                    showCancelButton: true,
                    confirmButtonColor: 'var(--success)',
                    cancelButtonColor: 'var(--primary)',
                    confirmButtonText: 'Отозвать',
                    cancelButtonText: 'Отмена'
                }).then((result) => {
                    if (result.value) {
                        @this.call('revokePermission', $id);
                    }
                });
            });
        })
    </script>
@endpush




