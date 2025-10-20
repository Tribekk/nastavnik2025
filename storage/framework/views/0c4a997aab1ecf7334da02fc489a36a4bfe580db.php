<?php $__env->startComponent('mail::message'); ?>
    # <?php echo e(__('Здравствуйте!')); ?>


    <?php echo e(__("Спасибо за регистрацию в Профтрекер!")); ?>


    Ваш код подтверждения: <?php echo e($code); ?>


    <?php echo app('translator')->get('С уважением'); ?>,
    <?php echo e(config('app.name')); ?>

<?php if (isset($__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d)): ?>
<?php $component = $__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d; ?>
<?php unset($__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php /**PATH /home/c109133/nastavnik2025.na4u.ru/www/resources/views/mail/user/verify.blade.php ENDPATH**/ ?>