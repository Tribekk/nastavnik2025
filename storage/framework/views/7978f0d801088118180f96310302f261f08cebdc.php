<?php $__env->startSection('content'); ?>
    <div class="login-form">
        <form class="form" method="POST" action="<?php echo e(route('login')); ?>">
            <?php echo csrf_field(); ?>
            <div class="pb-13 pt-lg-0 pt-5">
                <h3 class="font-weight-bolder text-dark font-size-h4 font-size-h1-lg"><?php echo e(__('Вход в личный кабинет')); ?></h3>
                <span class="text-muted font-weight-bold font-size-h4">
                    <a href="<?php echo e(route('register')); ?>" id="kt_login_signup" class="text-primary font-weight-bolder">
                        <?php echo e(__('Регистрация')); ?>

                    </a>
                </span>
            </div>

            <div class="form-group">
                <label class="font-size-h6 font-weight-bolder text-dark"><?php echo e(__('Телефон')); ?></label>
                <input
                    class="form-control form-control-solid h-auto py-4 px-6 rounded-lg <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                    type="text"
                    name="username"
                    id="phone"
                    placeholder="+7 (___) ___ __ __"
                    value="<?php echo e(old('username')); ?>"
                />
                <?php $__errorArgs = ['username'];
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
                <div class="d-flex justify-content-between mt-n5">
                    <label class="font-size-h6 font-weight-bolder text-dark pt-5"><?php echo e(__('Пароль')); ?></label>
                    <a href="<?php echo e(route('password.request')); ?>" class="text-primary font-size-h6 font-weight-bolder text-hover-primary pt-5" id="kt_login_forgot"><?php echo e(__('Забыли пароль?')); ?></a>
                </div>
                <input
                    class="form-control form-control-solid h-auto py-4 px-6 rounded-lg <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                    type="password"
                    name="password"
                    autocomplete="current-password"
                />
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
                <div class="checkbox-inline">
                    <label class="checkbox">
                        <input type="checkbox" class="mr-3" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>
                        <span></span><?php echo e(__('Запомнить меня')); ?></label>
                </div>
            </div>

            <div class="pb-lg-0 pb-5">
                <button type="submit" id="kt_login_signin_submit" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">
                    <?php echo e(__('Войти')); ?>

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

<?php echo $__env->make('layout.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\openserver\OpenServer\domains\prof\www\resources\views/auth/login.blade.php ENDPATH**/ ?>