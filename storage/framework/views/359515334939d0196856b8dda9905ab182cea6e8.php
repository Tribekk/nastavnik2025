<tbody class="datatable-body">
<?php $__currentLoopData = $registrations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $registration): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr class="font-size-lg">
        <td class="fit">
            <?php echo e($registrations->firstItem() + $index); ?>

        </td>

        <td class="fit">
            <?php echo e((new \Illuminate\Support\Carbon($registration->date))->format('d.m.Y')); ?>

        </td>

        <td class="fit">
            <?php echo e($registration->count); ?>

        </td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</tbody>
<?php /**PATH /home/c41010/mentor.na4u.ru/www/resources/views/admin/reports/_registrations/_table-body.blade.php ENDPATH**/ ?>