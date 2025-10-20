<div class="tab-pane show px-7" id="tmp-sms-tab" role="tabpanel">
    <div class="row">
        <div class="col-xl-2"></div>
        <div class="col-xl-7 my-2">
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('user.profile.tmp-sms', [])->html();
} elseif ($_instance->childHasBeenRendered('AwcpYJI')) {
    $componentId = $_instance->getRenderedChildComponentId('AwcpYJI');
    $componentTag = $_instance->getRenderedChildComponentTagName('AwcpYJI');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('AwcpYJI');
} else {
    $response = \Livewire\Livewire::mount('user.profile.tmp-sms', []);
    $html = $response->html();
    $_instance->logRenderedChild('AwcpYJI', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>
    </div>
</div>
<?php /**PATH /home/c109133/nastavnik2025.na4u.ru/www/resources/views/user/profile/_tmp-sms-tab.blade.php ENDPATH**/ ?>