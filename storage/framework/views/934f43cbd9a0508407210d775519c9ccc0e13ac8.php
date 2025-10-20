<tbody class="datatable-body">
<?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr class="font-size-lg">
        <td class="fit">
            <?php echo e($role->id); ?>

        </td>

        <td>
            <a href="<?php echo e(route('admin.roles.edit', $role)); ?>" class="text-dark-75 text-hover-primary font-weight-bolder mb-0">
                <?php echo e($role->title); ?>

            </a>
            <div class="text-muted font-weight-bold"><?php echo e(__('Код')); ?>: <?php echo e($role->name); ?></div>
        </td>

        <td>
            <?php echo e($role->description); ?>

        </td>

        <td>
            <?php echo e($role->guard_name); ?>

        </td>

        <td class="fit">
            <div class="font-weight-bolder text-primary mb-0"><?php echo e($role->created_at->format('d.m.Y H:i:s')); ?></div>
        </td>

        <td class="fit">
            <div class="font-weight-bolder text-primary mb-0"><?php echo e($role->updated_at->format('d.m.Y H:i:s')); ?></div>
        </td>

        <td>
            <div class="actions d-flex text-center">

            <a href="<?php echo e(route('admin.roles.permissions', $role)); ?>" class="btn btn-sm btn-default btn-text-primary btn-hover-primary btn-icon mr-2">
                <span class="svg-icon svg-icon-md"><i class="la la-pencil"></i></span>
            </a>

            <button wire:click="$emit('delete-role', <?php echo e($role->id); ?>)" class="btn btn-sm btn-default btn-text-primary btn-hover-primary btn-icon" title="<?php echo e(__('Удалить')); ?>">
                <span class="svg-icon svg-icon-md"><i class="la la-remove"></i></span>
            </button>

            </div>
        </td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</tbody>
<?php /**PATH /home/c41010/mentor.na4u.ru/www/resources/views/admin/authorization/roles/_index/_table-body.blade.php ENDPATH**/ ?>