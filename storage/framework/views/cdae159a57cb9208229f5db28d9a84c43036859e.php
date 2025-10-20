<div class="tab-pane show px-7" id="notifications-tab" role="tabpanel">
    <div class="row">
        <div class="col-xl-2"></div>
        <div class="col-xl-8 my-2">
            <?php $__currentLoopData = $user->notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('user.notification', ['notification' => $notification])->html();
} elseif ($_instance->childHasBeenRendered('aYvO5M4')) {
    $componentId = $_instance->getRenderedChildComponentId('aYvO5M4');
    $componentTag = $_instance->getRenderedChildComponentTagName('aYvO5M4');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('aYvO5M4');
} else {
    $response = \Livewire\Livewire::mount('user.notification', ['notification' => $notification]);
    $html = $response->html();
    $_instance->logRenderedChild('aYvO5M4', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<?php /**PATH /home/c109133/nastavnik2025.na4u.ru/www/resources/views/user/profile/_notifications-tab.blade.php ENDPATH**/ ?>