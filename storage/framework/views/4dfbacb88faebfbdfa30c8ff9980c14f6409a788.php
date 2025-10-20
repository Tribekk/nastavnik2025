<div x-data="{ selectRole: false, selectPermission: false }">
    <div class="row">
        <div class="col-xl-3"></div>
        <div class="col-xl-7 my-2">

            <div class="d-flex justify-content-between">
                <div>
                    <h3 class="font-weight-bolder text-primary font-size-h4 font-size-h1-lg"><?php echo e(__('Роли и разрешения')); ?></h3>
                </div>
            </div>

            <ul class="nav nav-tabs nav-tabs-line" wire:ignore>
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#select-roles"><?php echo e(__('Роли')); ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#select-permissions"><?php echo e(__('Разрешения')); ?></a>
                </li>
            </ul>
            <div class="tab-content mt-5" id="myTabContent">
                <div class="tab-pane fade show active" id="select-roles" role="tabpanel" wire:ignore.self>
                    <?php echo $__env->make('admin.users._edit._user_roles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="tab-pane fade" id="select-permissions" role="tabpanel" wire:ignore.self>
                    <?php echo $__env->make('admin.users._edit._user-permissions', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>

        </div>
    </div>

</div>

<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function () {
            $('#role_id').select2({
                placeholder: '<?php echo e(__('Выберите роль')); ?>',
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
                window.livewire.find('<?php echo e($_instance->id); ?>').set('roleId', e.target.value);
            });

            $('#permission_id').select2({
                placeholder: '<?php echo e(__('Выберите разрешение')); ?>',
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
                window.livewire.find('<?php echo e($_instance->id); ?>').set('permissionId', e.target.value);
            });
        });

        document.addEventListener('DOMContentLoaded', function () {
            window.livewire.find('<?php echo e($_instance->id); ?>').on('remove-role', $id => {
                Swal.fire({
                    title: 'Вы действительно хотите удалить роль?',
                    showCancelButton: true,
                    confirmButtonColor: 'var(--success)',
                    cancelButtonColor: 'var(--primary)',
                    confirmButtonText: 'Удалить',
                    cancelButtonText: 'Отмена'
                }).then((result) => {
                    if (result.value) {
                        window.livewire.find('<?php echo e($_instance->id); ?>').call('removeRole', $id);
                    }
                });
            });

            window.livewire.find('<?php echo e($_instance->id); ?>').on('revoke-permission', $id => {
                Swal.fire({
                    title: 'Вы действительно хотите отозвать разрешение?',
                    showCancelButton: true,
                    confirmButtonColor: 'var(--success)',
                    cancelButtonColor: 'var(--primary)',
                    confirmButtonText: 'Отозвать',
                    cancelButtonText: 'Отмена'
                }).then((result) => {
                    if (result.value) {
                        window.livewire.find('<?php echo e($_instance->id); ?>').call('revokePermission', $id);
                    }
                });
            });
        })
    </script>
<?php $__env->stopPush(); ?>




<?php /**PATH D:\openserver\OpenServer\domains\prof\www\resources\views/livewire/users/roles.blade.php ENDPATH**/ ?>