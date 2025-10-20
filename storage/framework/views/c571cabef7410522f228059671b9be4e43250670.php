<div class="tab-pane show px-7 active" id="user-tab" role="tabpanel">
    <div class="row">
        <div class="col-xl-2"></div>
        <div class="col-xl-7 my-2">
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('user.profile.account', [])->html();
} elseif ($_instance->childHasBeenRendered('8fR3e4T')) {
    $componentId = $_instance->getRenderedChildComponentId('8fR3e4T');
    $componentTag = $_instance->getRenderedChildComponentTagName('8fR3e4T');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('8fR3e4T');
} else {
    $response = \Livewire\Livewire::mount('user.profile.account', []);
    $html = $response->html();
    $_instance->logRenderedChild('8fR3e4T', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>
    </div>
</div>
<?php /**PATH /home/c109133/nastavnik2025.na4u.ru/www/resources/views/user/profile/_user-tab.blade.php ENDPATH**/ ?>