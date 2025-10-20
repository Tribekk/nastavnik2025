<div class="tab-pane show px-7" id="roles-tab" role="tabpanel">
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('users.roles', ['userId' => ''.e($user->id).''])->html();
} elseif ($_instance->childHasBeenRendered('qukLJlu')) {
    $componentId = $_instance->getRenderedChildComponentId('qukLJlu');
    $componentTag = $_instance->getRenderedChildComponentTagName('qukLJlu');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('qukLJlu');
} else {
    $response = \Livewire\Livewire::mount('users.roles', ['userId' => ''.e($user->id).'']);
    $html = $response->html();
    $_instance->logRenderedChild('qukLJlu', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?></livewire:users.roles>
</div>
<?php /**PATH D:\openserver\OpenServer\domains\prof\www\resources\views/admin/users/_edit/_roles-tab.blade.php ENDPATH**/ ?>