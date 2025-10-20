<tbody class="datatable-body">
<?php $__currentLoopData = $schools; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $school): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr class="font-size-lg">
        <td class="fit">
            <?php echo e($schools->firstItem() + $index); ?>

        </td>

        <td>
            <a href="<?php echo e(route('admin.schools.edit', $school)); ?>" class="font-weight-bolder link">
               <?php echo e($school->short_title ?? '-'); ?>

            </a>
        </td>

        <td class="text-left" style="vertical-align: middle;">
            <b>
                <?php echo e($city->first()->where('code', substr($school->local, 0, 2) . "00000000000")->value('name')); ?>

                <?php echo e($city->first()->where('code', substr($school->local, 0, 2) . "00000000000")->value('socr')); ?>  
                <?php echo e($city->first()->where('code', $school->local)->value('name')); ?> <?php echo e($city->first()->where('code', $school->local)->value('socr')); ?></b>   <?php echo e($school->address); ?> 
        </td>

         

        <td class="fit" style="vertical-align: middle;">
            <div class=" text-primary mb-0"><?php echo e($school->created_at->format('d.m.Y')); ?></div>
        </td>

        <td class="fit" style="vertical-align: middle;">
            <div class=" text-primary mb-0"><?php echo e($school->updated_at->format('d.m.Y')); ?></div>
        </td>

    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</tbody>
<?php /**PATH D:\openserver\OpenServer\domains\prof\www\resources\views/admin/schools/_index/_table-body.blade.php ENDPATH**/ ?>