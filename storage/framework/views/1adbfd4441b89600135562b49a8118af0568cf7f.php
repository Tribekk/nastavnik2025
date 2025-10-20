 <?php if (isset($component)) { $__componentOriginalf197bbd0186049fba79758ec2ea9b35409704436 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Tables\FilterInputs\Input::class, ['id' => 'q','name' => 'q','model' => true,'icon' => 'flaticon2-search-1','classes' => 'col-md-12','label' => ''.e(__('Поиск')).'','placeholder' => ''.e(__('Код, название или описание')).'','value' => ''.e(request()->q).'']); ?>
<?php $component->withName('tables.filter-inputs.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php if (isset($__componentOriginalf197bbd0186049fba79758ec2ea9b35409704436)): ?>
<?php $component = $__componentOriginalf197bbd0186049fba79758ec2ea9b35409704436; ?>
<?php unset($__componentOriginalf197bbd0186049fba79758ec2ea9b35409704436); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
<?php /**PATH /home/c41010/mentor.na4u.ru/www/resources/views/admin/authorization/permissions/_index/_search.blade.php ENDPATH**/ ?>