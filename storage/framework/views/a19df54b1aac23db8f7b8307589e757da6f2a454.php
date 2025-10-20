<div class="my-3 <?php echo e($classes); ?> <?php if($value && $value != 'all'): ?> text-success <?php endif; ?>">
    <label for="<?php echo e($id); ?>" class="mb-3"><?php echo e($label); ?></label>
    <select name="<?php echo e($name); ?>" id="<?php echo e($id); ?>" class="form-control form-control-solid">
        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($item['value']); ?>"
                    <?php if($value == $item['value']): ?> selected <?php endif; ?>><?php echo e($item['title']); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
</div>
<?php /**PATH D:\openserver\OpenServer\domains\prof\www\resources\views/components/tables/filter-inputs/select.blade.php ENDPATH**/ ?>