<div>
    <form wire:submit.prevent="updatePassword">
        <div class="pb-13 pt-lg-0 pt-5">
            <h3 class="font-weight-bolder text-primary font-size-h4 font-size-h1-lg"><?php echo e(__('Смена пароля')); ?></h3>
        </div>

        <div class="form-group">
            <label for="password" class="font-size-h6 font-weight-bolder text-dark required"><?php echo e(__('Новый пароль')); ?></label>
            <input
                wire:model="password"
                type="password"
                class="form-control form-control-solid h-auto py-4 px-6 rounded-lg <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                name="password"
            >
            <?php $__errorArgs = ['password'];
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

        <div class="form-group">
            <label for="password-confirm" class="font-size-h6 font-weight-bolder text-dark required"><?php echo e(__('Новый пароль еще раз')); ?></label>
            <input
                wire:model="password_confirmation"
                type="password"
                class="form-control form-control-solid h-auto py-4 px-6 rounded-lg <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                name="password_confirmation"
            >
            <?php $__errorArgs = ['password_confirmation'];
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
        <div class="pb-lg-0 pb-5">
            <button class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">
                <?php echo e(__('Сохранить')); ?>

            </button>
        </div>
    </form>
</div>

<?php /**PATH D:\openserver\OpenServer\domains\prof\www\resources\views/livewire/users/change-password.blade.php ENDPATH**/ ?>