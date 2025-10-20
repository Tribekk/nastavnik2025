<div class="form-group">
    <label for="<?php echo e($id); ?>" class="font-size-h6 font-weight-bolder text-dark <?php if($required): ?> required <?php endif; ?>"><?php echo e($title); ?></label>
    <select class="form-control form-control-solid h-auto py-4 px-6 rounded-lg" <?php if($model): ?> wire:model="<?php echo e($model); ?>" <?php endif; ?> name="<?php echo e($name); ?>" id="<?php echo e($id); ?>">
        <?php $__currentLoopData = $values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($item['value']); ?>" <?php if($item['value'] == $currentValue): ?> selected <?php endif; ?>><?php echo e($item['title']); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>

    <?php $__errorArgs = [$name];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
    <span class="text-danger font-size-sm">
        <strong><?php echo e($message); ?></strong>
    </span>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

</div>
<?php /**PATH /home/c41010/mentor.na4u.ru/www/resources/views/components/inputs/select.blade.php ENDPATH**/ ?>