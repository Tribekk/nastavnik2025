<div class="tab-pane px-7" id="classes-tab" role="tabpanel">
    <div class="row">
        <div class="col-md-8">
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('school.class-container', ['school' => $school])->html();
} elseif ($_instance->childHasBeenRendered('KKVDUp4')) {
    $componentId = $_instance->getRenderedChildComponentId('KKVDUp4');
    $componentTag = $_instance->getRenderedChildComponentTagName('KKVDUp4');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('KKVDUp4');
} else {
    $response = \Livewire\Livewire::mount('school.class-container', ['school' => $school]);
    $html = $response->html();
    $_instance->logRenderedChild('KKVDUp4', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>
    </div>
</div>
<?php /**PATH D:\openserver\OpenServer\domains\prof\www\resources\views/admin/schools/_edit/_classes-tab.blade.php ENDPATH**/ ?>