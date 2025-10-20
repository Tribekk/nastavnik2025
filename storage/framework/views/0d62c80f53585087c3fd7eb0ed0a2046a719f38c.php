<div class="tab-pane show px-7" id="security-tab" role="tabpanel">
    <div class="row">
        <div class="col-xl-2"></div>
        <div class="col-xl-7 my-2">
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('user.profile.password', [])->html();
} elseif ($_instance->childHasBeenRendered('6xk0779')) {
    $componentId = $_instance->getRenderedChildComponentId('6xk0779');
    $componentTag = $_instance->getRenderedChildComponentTagName('6xk0779');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('6xk0779');
} else {
    $response = \Livewire\Livewire::mount('user.profile.password', []);
    $html = $response->html();
    $_instance->logRenderedChild('6xk0779', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>
    </div>
</div>
<?php /**PATH /home/c41010/mentor.na4u.ru/www/resources/views/user/profile/_security-tab.blade.php ENDPATH**/ ?>