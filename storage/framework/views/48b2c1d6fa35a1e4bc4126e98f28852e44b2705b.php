<div class="tab-pane show px-7" id="roles-tab" role="tabpanel">
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('users.roles', ['userId' => ''.e($user->id).''])->html();
} elseif ($_instance->childHasBeenRendered('80Xd226')) {
    $componentId = $_instance->getRenderedChildComponentId('80Xd226');
    $componentTag = $_instance->getRenderedChildComponentTagName('80Xd226');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('80Xd226');
} else {
    $response = \Livewire\Livewire::mount('users.roles', ['userId' => ''.e($user->id).'']);
    $html = $response->html();
    $_instance->logRenderedChild('80Xd226', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?></livewire:users.roles>
</div>
<?php /**PATH /home/c41010/mentor.na4u.ru/www/resources/views/admin/users/_edit/_roles-tab.blade.php ENDPATH**/ ?>