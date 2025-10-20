<tbody class="datatable-body">
<?php $__currentLoopData = $orgunits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $orgunit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr class="font-size-lg">
        <td class="fit">
            <?php echo e($orgunits->firstItem() + $index); ?>

        </td>

        <td>
            <div class="d-flex align-items-center min-w-225px max-w-225px">
                <div class="symbol symbol-40 symbol-sm flex-shrink-0 d-none d-md-block">
                    <img src="<?php echo e($orgunit->logoUrl); ?>">
                </div>
                <div class="ml-4">
                    <a href="<?php echo e(route('orgunits.edit', $orgunit)); ?>" class="font-weight-bolder link text-break">
                        <?php echo $orgunit->title; ?>

                    </a>
                </div>
            </div>
        </td>

        <td>
            <div class="d-flex align-items-center min-w-225px max-w-225px">
                <?php if($orgunit->parent): ?>
                    <div class="symbol symbol-40 symbol-sm flex-shrink-0 d-none d-md-block">
                        <img src="<?php echo e($orgunit->parent->logoUrl); ?>">
                    </div>
                    <div class="ml-4">
                        <a href="<?php echo e(route('orgunits.edit', $orgunit->parent)); ?>" class="font-weight-bolder link text-break">
                            <?php echo $orgunit->parent->title; ?>

                        </a>
                    </div>
                <?php else: ?>
                    <div class="text-dark-75 mt-2 font-size-lg mb-0">Нет родительской организации</div>
                <?php endif; ?>
            </div>
        </td>

        <td class="">
            <div class="mb-0"><?php echo e($orgunit->legalForm->title); ?></div>
        </td>

        <td class="">
            <?php $__currentLoopData = $orgunit->activityKinds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activityKind): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div><?php echo e($activityKind->activityKind->title); ?></div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </td>

        <td class="fit" style="vertical-align: middle;">
            <div class=" text-primary mb-0"><?php echo e($orgunit->created_at->format('d.m.Y')); ?></div>
        </td>

        <td class="fit" style="vertical-align: middle;">
            <div class=" text-primary mb-0"><?php echo e($orgunit->updated_at->format('d.m.Y')); ?></div>
        </td>

    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</tbody>
<?php /**PATH /home/c41010/mentor.na4u.ru/www/resources/views/orgunits/_index/_table-body.blade.php ENDPATH**/ ?>