<div class="tab-pane px-7" id="classes-tab" role="tabpanel">
    <div class="row">
        <div class="col-md-8">
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('school.class-container', ['school' => $school])->html();
} elseif ($_instance->childHasBeenRendered('Hb5uL5H')) {
    $componentId = $_instance->getRenderedChildComponentId('Hb5uL5H');
    $componentTag = $_instance->getRenderedChildComponentTagName('Hb5uL5H');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('Hb5uL5H');
} else {
    $response = \Livewire\Livewire::mount('school.class-container', ['school' => $school]);
    $html = $response->html();
    $_instance->logRenderedChild('Hb5uL5H', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>
    </div>
</div>
<?php /**PATH /home/c41010/mentor.na4u.ru/www/resources/views/admin/schools/_edit/_classes-tab.blade.php ENDPATH**/ ?>