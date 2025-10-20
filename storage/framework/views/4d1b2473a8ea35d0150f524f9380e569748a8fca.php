<tbody class="datatable-body">
<?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr class="font-size-lg">
        <td class="fit">
            <?php echo e($index+1); ?>

        </td>

        <td class="fit">
            <?php echo e((new \Carbon\Carbon($result->date))->format('d.m.Y')); ?>

        </td>

        <td class="fit">
            <?php echo e($result->ctr_count); ?>

        </td>

        <td class="fit">
            <?php echo e($result->ptr_count); ?>

        </td>

        <td class="fit">
            <?php echo e($result->spr_count); ?>

        </td>

        <td class="fit">
            <?php echo e($result->ir_count); ?>

        </td>

        <td class="fit">
            <?php echo e($result->ilr_count); ?>

        </td>

        <td class="fit">
            <?php echo e($result->ttr_count); ?>

        </td>

        <td class="fit">
            <?php echo e($result->scr_count); ?>

        </td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</tbody>
<?php /**PATH /home/c41010/mentor.na4u.ru/www/resources/views/admin/reports/_tests/_table-body.blade.php ENDPATH**/ ?>