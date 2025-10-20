<div class="tab-pane show px-7 active" id="user-tab" role="tabpanel">
    <div class="row">
        <div class="col-xl-2"></div>
        <div class="col-xl-7 my-2">
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('user.profile.account', [])->html();
} elseif ($_instance->childHasBeenRendered('SSCAHjP')) {
    $componentId = $_instance->getRenderedChildComponentId('SSCAHjP');
    $componentTag = $_instance->getRenderedChildComponentTagName('SSCAHjP');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('SSCAHjP');
} else {
    $response = \Livewire\Livewire::mount('user.profile.account', []);
    $html = $response->html();
    $_instance->logRenderedChild('SSCAHjP', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>
    </div>
</div>
<?php /**PATH /home/c41010/mentor.na4u.ru/www/resources/views/user/profile/_user-tab.blade.php ENDPATH**/ ?>