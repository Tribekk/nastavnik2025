<div class="tab-pane show px-7" id="security-tab" role="tabpanel">
    <div class="row">
        <div class="col-xl-2"></div>
        <div class="col-xl-7 my-2">
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('user.profile.password', [])->html();
} elseif ($_instance->childHasBeenRendered('sPJRIjh')) {
    $componentId = $_instance->getRenderedChildComponentId('sPJRIjh');
    $componentTag = $_instance->getRenderedChildComponentTagName('sPJRIjh');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('sPJRIjh');
} else {
    $response = \Livewire\Livewire::mount('user.profile.password', []);
    $html = $response->html();
    $_instance->logRenderedChild('sPJRIjh', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>
    </div>
</div>
<?php /**PATH /home/c109133/nastavnik2025.na4u.ru/www/resources/views/user/profile/_security-tab.blade.php ENDPATH**/ ?>