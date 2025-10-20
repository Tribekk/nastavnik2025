<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('filters.school-and-class', ['classes' => 'row no-gutters col-md-6 col-lg-5 my-3','schoolClasses' => 'col-md-6 mt-6 mt-md-0 pr-md-4 pr-0','classClasses' => 'col-md-6 mt-6 mt-md-0 pl-md-4 pl-0'])->html();
} elseif ($_instance->childHasBeenRendered('w3Yvw0h')) {
    $componentId = $_instance->getRenderedChildComponentId('w3Yvw0h');
    $componentTag = $_instance->getRenderedChildComponentTagName('w3Yvw0h');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('w3Yvw0h');
} else {
    $response = \Livewire\Livewire::mount('filters.school-and-class', ['classes' => 'row no-gutters col-md-6 col-lg-5 my-3','schoolClasses' => 'col-md-6 mt-6 mt-md-0 pr-md-4 pr-0','classClasses' => 'col-md-6 mt-6 mt-md-0 pl-md-4 pl-0']);
    $html = $response->html();
    $_instance->logRenderedChild('w3Yvw0h', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

 <?php if (isset($component)) { $__componentOriginalc50993156ccf2819e884fe38ba86d52a90faf26b = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Tables\FilterInputs\Select::class, ['id' => 'group','name' => 'group','classes' => 'col-md-3','label' => ''.e(__('Тип тестирования')).'','items' => [['title' => 'Базовое', 'value' => 'base'], ['title' => 'Глубинное', 'value' => 'depth']],'value' => ''.e(request()->group).'']); ?>
<?php $component->withName('tables.filter-inputs.select'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php if (isset($__componentOriginalc50993156ccf2819e884fe38ba86d52a90faf26b)): ?>
<?php $component = $__componentOriginalc50993156ccf2819e884fe38ba86d52a90faf26b; ?>
<?php unset($__componentOriginalc50993156ccf2819e884fe38ba86d52a90faf26b); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 

<?php /**PATH /home/c41010/mentor.na4u.ru/www/resources/views/admin/reports/_students_tests/_search.blade.php ENDPATH**/ ?>