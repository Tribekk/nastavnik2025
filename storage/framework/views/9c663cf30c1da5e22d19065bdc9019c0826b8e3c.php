<div class="tab-pane show px-7" id="notifications-tab" role="tabpanel">
    <div class="row">
        <div class="col-xl-2"></div>
        <div class="col-xl-8 my-2">
            <?php $__currentLoopData = $user->notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('user.notification', ['notification' => $notification])->html();
} elseif ($_instance->childHasBeenRendered('ZcNOou2')) {
    $componentId = $_instance->getRenderedChildComponentId('ZcNOou2');
    $componentTag = $_instance->getRenderedChildComponentTagName('ZcNOou2');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('ZcNOou2');
} else {
    $response = \Livewire\Livewire::mount('user.notification', ['notification' => $notification]);
    $html = $response->html();
    $_instance->logRenderedChild('ZcNOou2', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<?php /**PATH /home/c41010/mentor.na4u.ru/www/resources/views/user/profile/_notifications-tab.blade.php ENDPATH**/ ?>