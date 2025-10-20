<div>

    <h5 class="mb-5"><?php echo e(__('Уведомления')); ?></h5>

    <?php $__empty_1 = true; $__currentLoopData = Auth::user()->unreadNotifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('user.notification', ['notification' => $notification])->html();
} elseif ($_instance->childHasBeenRendered('WOp68wc')) {
    $componentId = $_instance->getRenderedChildComponentId('WOp68wc');
    $componentTag = $_instance->getRenderedChildComponentTagName('WOp68wc');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('WOp68wc');
} else {
    $response = \Livewire\Livewire::mount('user.notification', ['notification' => $notification]);
    $html = $response->html();
    $_instance->logRenderedChild('WOp68wc', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div class="alert alert-outline-secondary"><?php echo e(__('Уведомлений нет')); ?></div>
    <?php endif; ?>


</div>
<?php /**PATH D:\openserver\OpenServer\domains\prof\www\resources\views/layout/partials/_extras/offcanvas/_quick-user/_notifications.blade.php ENDPATH**/ ?>