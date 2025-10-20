<div class="tab-pane show px-7" id="tmp-sms-tab" role="tabpanel">
    <div class="row">
        <div class="col-xl-2"></div>
        <div class="col-xl-7 my-2">
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('user.profile.tmp-sms', [])->html();
} elseif ($_instance->childHasBeenRendered('2yRLefn')) {
    $componentId = $_instance->getRenderedChildComponentId('2yRLefn');
    $componentTag = $_instance->getRenderedChildComponentTagName('2yRLefn');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('2yRLefn');
} else {
    $response = \Livewire\Livewire::mount('user.profile.tmp-sms', []);
    $html = $response->html();
    $_instance->logRenderedChild('2yRLefn', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>
    </div>
</div>
<?php /**PATH /home/c41010/mentor.na4u.ru/www/resources/views/user/profile/_tmp-sms-tab.blade.php ENDPATH**/ ?>