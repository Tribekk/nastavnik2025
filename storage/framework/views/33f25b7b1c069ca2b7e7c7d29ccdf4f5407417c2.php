<?php $__env->startSection('subheader'); ?>
     <?php if (isset($component)) { $__componentOriginal94da708f5fed2e003e635f558c4309c9810b422b = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Subheader::class, ['title' => 'Отчеты']); ?>
<?php $component->withName('subheader'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php if (isset($__componentOriginal94da708f5fed2e003e635f558c4309c9810b422b)): ?>
<?php $component = $__componentOriginal94da708f5fed2e003e635f558c4309c9810b422b; ?>
<?php unset($__componentOriginal94da708f5fed2e003e635f558c4309c9810b422b); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
         <?php if (isset($component)) { $__componentOriginal5537beb2e27514b217ef87ccd55efec39410ded0 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Tables\Filters::class, ['clearHref' => ''.e(route('admin.reports.student_questionnaires')).'']); ?>
<?php $component->withName('tables.filters'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
            <?php echo $__env->make('admin.reports._student-questionnaires._search', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
         <?php if (isset($__componentOriginal5537beb2e27514b217ef87ccd55efec39410ded0)): ?>
<?php $component = $__componentOriginal5537beb2e27514b217ef87ccd55efec39410ded0; ?>
<?php unset($__componentOriginal5537beb2e27514b217ef87ccd55efec39410ded0); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 

         <?php if (isset($component)) { $__componentOriginal5f1c24da064cdf37917762bf37a30d0804319ee8 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Card::class, []); ?>
<?php $component->withName('card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
             <?php $__env->slot('title'); ?> <?php echo e(__('Анкеты наставников')); ?> <?php $__env->endSlot(); ?>

            <?php if($questionnaires->count() > 0): ?>
                <?php echo $__env->make('admin.reports._student-questionnaires._table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php else: ?>
                 <?php if (isset($component)) { $__componentOriginal48fbbe9627cbd0bd4f43258bfa025aff722815bb = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Tables\EmptyAlert::class, ['text' => ''.e(__('По вашему запросу не найдено ни одной анкеты.')).'']); ?>
<?php $component->withName('tables.empty-alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal48fbbe9627cbd0bd4f43258bfa025aff722815bb)): ?>
<?php $component = $__componentOriginal48fbbe9627cbd0bd4f43258bfa025aff722815bb; ?>
<?php unset($__componentOriginal48fbbe9627cbd0bd4f43258bfa025aff722815bb); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
            <?php endif; ?>
         <?php if (isset($__componentOriginal5f1c24da064cdf37917762bf37a30d0804319ee8)): ?>
<?php $component = $__componentOriginal5f1c24da064cdf37917762bf37a30d0804319ee8; ?>
<?php unset($__componentOriginal5f1c24da064cdf37917762bf37a30d0804319ee8); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/c41010/mentor.na4u.ru/www/resources/views/admin/reports/student_questionnaires.blade.php ENDPATH**/ ?>