<tbody class="datatable-body">
<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr class="font-size-lg">
        <td class="fit">
            <?php echo e($users->firstItem() + $index); ?>

        </td>

        <td>
            <div class="d-flex align-items-center">
                <div class="symbol symbol-40 symbol-sm flex-shrink-0 d-none d-md-block">
                    <img src="<?php echo e($user->avatarUrl); ?>">
                </div>
                <div class="ml-4">
                    <a href="<?php echo e(route('admin.users.edit', $user)); ?>" class="font-weight-bolder link">
                        <?php echo e($user->fullName); ?>

                    </a>
                    <div class="font-weight-bold <?php echo e($user->roles->count() > 0 ? 'text-primary' : 'text-muted'); ?>"><?php echo e(__('Роли')); ?>: <?php echo e($user->rolesAsString); ?></div>
                </div>
            </div>
        </td>

        <td class="text-center" style="vertical-align: middle;">
            <?php if($user->isAdmin): ?>
                <i class="la la-check text-success"></i>
            <?php else: ?>
                <i class="la la-minus text-muted"></i>
            <?php endif; ?>
        </td>

        <td class="fit" style="vertical-align: middle;">
            <div class=" text-primary mb-0"><?php echo e($user->created_at->format('d.m.Y')); ?><br/><?php echo e($user->created_at->format('H:i:s')); ?></div>
        </td>

        <td class="fit" style="vertical-align: middle;">
            <div class=" text-primary mb-0"><?php echo e($user->updated_at->format('d.m.Y')); ?><br/><?php echo e($user->updated_at->format('H:i:s')); ?></div>
        </td>

    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</tbody>
<?php /**PATH D:\openserver\OpenServer\domains\prof\www\resources\views/admin/users/_index/_table-body.blade.php ENDPATH**/ ?>