<?php $__env->startSection('content'); ?>
    <div>

        <form class="form" method="POST" action="<?php echo e(route('register.verify')); ?>">
            <?php echo csrf_field(); ?>

            <div class="pb-13 pt-lg-0 pt-5">
                <h3 class="font-weight-bolder text-dark font-size-h4 font-size-h1-lg"><?php echo e(__('Подтверждение регистрации')); ?></h3>
                <span class="text-muted font-weight-bold font-size-h4">
                    <?php echo e(__('Уже зарегистрированы?')); ?>

                    <a href="<?php echo e(route('login')); ?>" class="text-primary font-weight-bolder">
                        <?php echo e(__('Вход')); ?>

                    </a>
                </span>
            </div>

            <p>На введенный Вами телефон был отправлен код для подтверждения регистрации.</p>

            <?php
                /**
                 * Патч от 18.10.2020
                 *
                 * TODO
                 * Убрать когда будут решены проблемы смс на Мотив.
                 */
            ?>

            <?php if(session()->has('sms_code') && env('APP_ENV') !== 'production'): ?>
                 <?php if (isset($component)) { $__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Alert::class, ['type' => 'info','text' => ''.e(__('Код из смс: ' . session('sms_code'))).'','close' => false]); ?>
<?php $component->withName('alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php if (isset($__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975)): ?>
<?php $component = $__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975; ?>
<?php unset($__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
            <?php endif; ?>

            <p>
                Не получили код?
                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#code">
                    Нажмите сюда
                </button>
            </p>
            <div class="collapse" id="code">
                 <?php if (isset($component)) { $__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Alert::class, ['type' => 'info','text' => ''.e(__('Код: ' . session('sms_code'))).'','close' => false]); ?>
<?php $component->withName('alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php if (isset($__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975)): ?>
<?php $component = $__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975; ?>
<?php unset($__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
            </div>

             <?php if (isset($component)) { $__componentOriginal6f417fce8705f24be4ffdd0013eba9d6e3da039f = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\InputTextV::class, ['title' => ''.e(__('Код подтверждения регистрации')).'','type' => 'text','value' => ''.e(old('code')).'','placeholder' => 'Введите код','name' => 'code','id' => 'code','prependIcon' => 'la la-key','required' => true]); ?>
<?php $component->withName('inputs.input-text-v'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php if (isset($__componentOriginal6f417fce8705f24be4ffdd0013eba9d6e3da039f)): ?>
<?php $component = $__componentOriginal6f417fce8705f24be4ffdd0013eba9d6e3da039f; ?>
<?php unset($__componentOriginal6f417fce8705f24be4ffdd0013eba9d6e3da039f); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 

            <div class="form-group">
                <div class="checkbox-inline">
                    <label class="checkbox">
                        <input type="checkbox" class="mr-3" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>
                        <span></span><?php echo e(__('Запомнить меня')); ?></label>
                </div>
            </div>

            <div class="pb-lg-0 pb-5">
                <a href="<?php echo e(route('register')); ?>" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">
                    <?php echo e(__('Назад')); ?>

                </a>

                <button type="submit" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">
                    <?php echo e(__('Зарегистрироваться')); ?>

                </button>
            </div>

        </form>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.register', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/c41010/mentor.na4u.ru/www/resources/views/auth/register/verify.blade.php ENDPATH**/ ?>