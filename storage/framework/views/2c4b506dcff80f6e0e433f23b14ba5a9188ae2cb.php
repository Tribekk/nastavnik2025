<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('do-everything-you-want')): ?>
     <?php if (isset($component)) { $__componentOriginalbd9bfb060215fd977b3454663c6b76a3f129c1d6 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\MenuSection::class, ['title' => ''.e(__('Администрирование')).'']); ?>
<?php $component->withName('menu-section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php if (isset($__componentOriginalbd9bfb060215fd977b3454663c6b76a3f129c1d6)): ?>
<?php $component = $__componentOriginalbd9bfb060215fd977b3454663c6b76a3f129c1d6; ?>
<?php unset($__componentOriginalbd9bfb060215fd977b3454663c6b76a3f129c1d6); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 

    <?php echo $__env->make('layout.partials._aside._menu_admin._menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>

<?php /**PATH D:\openserver\OpenServer\domains\prof\www\resources\views/layout/partials/_aside/_menu-admin.blade.php ENDPATH**/ ?>