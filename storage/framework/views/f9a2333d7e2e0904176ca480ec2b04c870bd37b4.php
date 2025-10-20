<tbody class="datatable-body">
<?php $__currentLoopData = $legalForms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $legalForm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr class="font-size-lg">
        <td class="fit">
            <?php echo e($legalForms->firstItem() + $index); ?>

        </td>

        <td>
            <div class="d-flex align-items-center">
                <div class="ml-4">
                    <a href="<?php echo e(route('admin.orgunits.legal_forms.edit', $legalForm)); ?>" class="font-weight-bolder link">
                        <?php echo e($legalForm->title); ?>

                    </a>
                </div>
            </div>
        </td>

        <td class="" style="vertical-align: middle;">
            <?php if($legalForm->disabled_at): ?>
                <div class="text-primary mb-0">Нет, с:<br><?php echo e((new \Carbon\Carbon($legalForm->disabled_at))->format('d.m.Y')); ?></div>
            <?php else: ?>
                <div class="text-success mb-0">Да</div>
            <?php endif; ?>
        </td>

        <td class="fit" style="vertical-align: middle;">
            <div class=" text-primary mb-0"><?php echo e($legalForm->created_at->format('d.m.Y')); ?></div>
        </td>

        <td class="fit" style="vertical-align: middle;">
            <div class=" text-primary mb-0"><?php echo e($legalForm->updated_at->format('d.m.Y')); ?></div>
        </td>

    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</tbody>
<?php /**PATH /home/c41010/mentor.na4u.ru/www/resources/views/admin/orgunits/legal_forms/_index/_table-body.blade.php ENDPATH**/ ?>