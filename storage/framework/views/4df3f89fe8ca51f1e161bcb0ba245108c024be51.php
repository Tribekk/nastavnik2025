<div class="form-group">
    <?php if($title): ?>
        <label for="<?php echo e($id); ?>" class="font-size-h6 font-weight-bolder text-dark <?php if($required): ?> required <?php endif; ?>"><?php echo e($title); ?></label>
    <?php endif; ?>
    <textarea
        name="<?php echo e($name); ?>"
        <?php if($model): ?> wire:model.defer="<?php echo e($model); ?>" <?php endif; ?>
        <?php if($readOnly): ?> readonly <?php endif; ?>
        class="form-control form-control-solid min-h-40px py-2 px-3 rounded-lg  <?php $__errorArgs = [strArrToPath($name)];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
        id="<?php echo e($id); ?>"
        rows="<?php echo e($rows); ?>"><?php if(old($name)): ?> <?php echo e(old($name)); ?> <?php else: ?> <?php echo $value; ?> <?php endif; ?></textarea>

    <?php $__errorArgs = [strArrToPath($name)];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <span class="invalid-feedback font-size-sm">
            <strong><?php echo e($message); ?></strong>
        </span>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</div>
<?php /**PATH D:\openserver\OpenServer\domains\prof\www\resources\views/components/inputs/text-area.blade.php ENDPATH**/ ?>