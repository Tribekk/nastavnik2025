<tbody class="datatable-body">
<?php $__currentLoopData = $audience; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr class="font-size-lg">
        <td class="fit">
            <?php echo e($audience->firstItem() + $index); ?>

        </td>

        <td>
            <a href="<?php echo e(route('employer.events.audience.edit', $item)); ?>" class="font-weight-bold link"><?php echo e($item->title); ?></a>
        </td>

        <td class="fit" style="vertical-align: middle;">
            <div class=" text-primary mb-0"><?php echo e($item->created_at->format('d.m.Y')); ?></div>
        </td>

        <td class="fit" style="vertical-align: middle;">
            <div class=" text-primary mb-0"><?php echo e($item->updated_at->format('d.m.Y')); ?></div>
        </td>

    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</tbody>
<?php /**PATH /home/c41010/mentor.na4u.ru/www/resources/views/events/audience/_index/_table-body.blade.php ENDPATH**/ ?>