<?php $__env->startSection('content'); ?>
    <div>
        <form class="form" method="POST" action="<?php echo e(route('password.phone')); ?>">
            <?php echo csrf_field(); ?>
            <div class="pb-13 pt-lg-0 pt-5">
                <h3 class="font-weight-bolder text-dark font-size-h4 font-size-h1-lg"><?php echo e(__('Восстановление пароля')); ?></h3>
                <span class="text-muted font-weight-bold font-size-h4">
                    <a href="<?php echo e(route('login')); ?>" id="kt_login_signup" class="text-primary font-weight-bolder">
                        <?php echo e(__('Вход в систему')); ?>

                    </a>
                </span>
            </div>

            <?php $__errorArgs = ['sms_error'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                 <?php if (isset($component)) { $__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Alert::class, ['type' => 'danger','text' => ''.e($message).'','close' => false]); ?>
<?php $component->withName('alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php if (isset($__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975)): ?>
<?php $component = $__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975; ?>
<?php unset($__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

            <div class="form-group">
                <label class="font-size-h6 font-weight-bolder text-dark"><?php echo e(__('Телефон')); ?></label>
                <input
                    class="form-control form-control-solid h-auto py-4 px-6 rounded-lg <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                    type="tel"
                    id="phone"
                    name="phone"
                    placeholder="+7 (___) ___ __ __"
                    value="<?php echo e(old('phone')); ?>"
                    autocomplete="phone"
                />
                <?php $__errorArgs = ['phone'];
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
                <button type="submit" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">
                    <?php echo e(__('Отправить код для восстановление пароля')); ?>

                </button>
            </div>
        </form>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function() {
            $("#phone").inputmask("+7 (999) 999 99 99");
        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layout.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/c109133/nastavnik2025.na4u.ru/www/resources/views/auth/passwords/phone.blade.php ENDPATH**/ ?>