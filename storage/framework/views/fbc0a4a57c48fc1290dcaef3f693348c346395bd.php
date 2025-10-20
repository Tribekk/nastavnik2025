<li class="nav-item mr-3">
    <a class="nav-link active" data-toggle="tab" href="#user-tab">
        <span class="nav-icon">
            <i class="la la-user"></i>
        </span>
        <span class="nav-text font-size-lg"><?php echo e(__('Пользователь')); ?></span>
    </a>
</li>


<li class="nav-item mr-3">
    <a class="nav-link mx-0" data-toggle="tab" href="#security-tab">
        <span class="nav-icon">
            <i class="la la-lock"></i>
        </span>
        <span class="nav-text font-size-lg"><?php echo e(__('Безопасность')); ?></span>
    </a>
</li>

<li class="nav-item mr-3">
    <a class="nav-link" data-toggle="tab" href="#notifications-tab">
        <span class="nav-icon">
            <i class="la la-telegram"></i>
        </span>
        <span class="nav-text font-size-lg">
            <?php echo e(__('Уведомления')); ?>

            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('user.profile.unread-notifications-count', [])->html();
} elseif ($_instance->childHasBeenRendered('8JAWk6g')) {
    $componentId = $_instance->getRenderedChildComponentId('8JAWk6g');
    $componentTag = $_instance->getRenderedChildComponentTagName('8JAWk6g');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('8JAWk6g');
} else {
    $response = \Livewire\Livewire::mount('user.profile.unread-notifications-count', []);
    $html = $response->html();
    $_instance->logRenderedChild('8JAWk6g', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </span>
    </a>
</li>
<?php if( auth()->user()->can('admin') || auth()->user()->hasRole('employer')): ?>
<li class="nav-item mr-3">
    <a class="nav-link mx-0" data-toggle="tab" href="#tmp-sms-tab">
        <span class="nav-icon">
            <i class="la la-sms"></i>
        </span>
        <span class="nav-text font-size-lg"><?php echo e(__('Шаблоны смс')); ?></span>
    </a>
</li>
<?php endif; ?>
<?php /**PATH /home/c109133/nastavnik2025.na4u.ru/www/resources/views/user/profile/_nav-items.blade.php ENDPATH**/ ?>