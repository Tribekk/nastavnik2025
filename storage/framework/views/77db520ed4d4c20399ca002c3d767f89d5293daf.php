<div class="form-group">
    <label for="<?php echo e($id); ?>" class="font-size-h6 font-weight-bolder text-dark <?php if($required): ?> required <?php endif; ?>"><?php echo e($title); ?></label>
    <div class="radio-inline">
        <?php echo e($slot); ?>

    </div>

    <?php $__errorArgs = [$name];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <span class="invalid-feedback" role="alert">
            <strong><?php echo e($message); ?></strong>
        </span>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</div>
<?php /**PATH /home/c41010/mentor.na4u.ru/www/resources/views/components/inputs/radio-group.blade.php ENDPATH**/ ?>