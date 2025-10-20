<tbody class="datatable-body">
<?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr class="font-size-lg">
        <td class="fit">
            <?php echo e($events->firstItem() + $index); ?>

        </td>

        <td>
            <a href="<?php echo e(route('events.show', $item)); ?>" class="font-weight-bold link"><?php echo e($item->event->title); ?></a>
        </td>

        <td>
            <?php $__currentLoopData = $item->event->directions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $direction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div><?php echo e($direction->direction->title); ?></div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </td>

        <td>
            <?php echo e($item->event->format->title); ?>

        </td>

        <td class="text-nowrap">
            <span class="<?php echo e($item->eventState->color()); ?>"><?php echo e($item->eventState->title()); ?></span>
        </td>

        <td class="fit" style="vertical-align: middle;">
            <div class=" text-primary mb-0"><?php echo e($item->event->start_at->format('d.m.Y H:i')); ?></div>
        </td>

        <td class="fit" style="vertical-align: middle;">
            <div class=" text-primary mb-0"><?php echo e($item->event->finish_at->format('d.m.Y H:i')); ?></div>
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
<?php /**PATH /home/c41010/mentor.na4u.ru/www/resources/views/events/user/_index/_table-body.blade.php ENDPATH**/ ?>