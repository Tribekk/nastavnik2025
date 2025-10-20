<div class="tab-pane show px-7" id="security-tab" role="tabpanel">
    <div class="row">
        <div class="col-xl-3"></div>
        <div class="col-xl-7 my-2">
            <div>
                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('users.change-password', ['userId' => $user->id])->html();
} elseif ($_instance->childHasBeenRendered('9WRUZHg')) {
    $componentId = $_instance->getRenderedChildComponentId('9WRUZHg');
    $componentTag = $_instance->getRenderedChildComponentTagName('9WRUZHg');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('9WRUZHg');
} else {
    $response = \Livewire\Livewire::mount('users.change-password', ['userId' => $user->id]);
    $html = $response->html();
    $_instance->logRenderedChild('9WRUZHg', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
            </div>
        </div>
    </div>
</div>
<?php /**PATH D:\openserver\OpenServer\domains\prof\www\resources\views/admin/users/_edit/_security-tab.blade.php ENDPATH**/ ?>