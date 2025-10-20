<div class="tab-pane show px-7" id="security-tab" role="tabpanel">
    <div class="row">
        <div class="col-xl-3"></div>
        <div class="col-xl-7 my-2">
            <div>
                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('users.change-password', ['userId' => $user->id])->html();
} elseif ($_instance->childHasBeenRendered('AmpjEr1')) {
    $componentId = $_instance->getRenderedChildComponentId('AmpjEr1');
    $componentTag = $_instance->getRenderedChildComponentTagName('AmpjEr1');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('AmpjEr1');
} else {
    $response = \Livewire\Livewire::mount('users.change-password', ['userId' => $user->id]);
    $html = $response->html();
    $_instance->logRenderedChild('AmpjEr1', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/c41010/mentor.na4u.ru/www/resources/views/admin/users/_edit/_security-tab.blade.php ENDPATH**/ ?>