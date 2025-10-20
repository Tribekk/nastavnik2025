<div class="my-3 col-md-4">
    <div class="form-group">
        <label class="mb-3">Вероятность остаться в родном городе</label>
        <div class="ion-range-slider progress-success">
            <input type="hidden" id="chances_of_staying" name="chances_of_staying"/>
        </div>
    </div>
</div>

 <?php if (isset($component)) { $__componentOriginal3358ea642e1c3f0b1e96ca690b2e1c3c59b4d774 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Tables\FilterInputs\Select2::class, ['classes' => 'col-md-4','name' => 'activity_kind','id' => 'activity_kind','label' => ''.e(__('Выбор по матрице профессий')).'','placeholder' => ''.e(__('Выбор по матрице профессий')).'','event' => 'filterActivityKind','indexUrl' => ''.e(route('profession.activity_kinds.list')).'','showUrl' => '/profession/activity_kinds','value' => ''.e(request()->activity_kind).'']); ?>
<?php $component->withName('tables.filter-inputs.select2'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php if (isset($__componentOriginal3358ea642e1c3f0b1e96ca690b2e1c3c59b4d774)): ?>
<?php $component = $__componentOriginal3358ea642e1c3f0b1e96ca690b2e1c3c59b4d774; ?>
<?php unset($__componentOriginal3358ea642e1c3f0b1e96ca690b2e1c3c59b4d774); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 

 <?php if (isset($component)) { $__componentOriginal3358ea642e1c3f0b1e96ca690b2e1c3c59b4d774 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Tables\FilterInputs\Select2::class, ['classes' => 'col-md-4','name' => 'activity_object','id' => 'activity_object','label' => ''.e(__('Выбор по матрице профессий')).'','placeholder' => ''.e(__('Выбор по матрице профессий')).'','event' => 'filterActivityObject','indexUrl' => ''.e(route('profession.activity_objects.list')).'','showUrl' => '/profession/activity_objects','value' => ''.e(request()->activity_object).'']); ?>
<?php $component->withName('tables.filter-inputs.select2'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php if (isset($__componentOriginal3358ea642e1c3f0b1e96ca690b2e1c3c59b4d774)): ?>
<?php $component = $__componentOriginal3358ea642e1c3f0b1e96ca690b2e1c3c59b4d774; ?>
<?php unset($__componentOriginal3358ea642e1c3f0b1e96ca690b2e1c3c59b4d774); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 

<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('filters.school-and-class', ['classes' => 'row no-gutters col-md-8 my-3','schoolClasses' => 'col-md-6 mt-md-0 pr-md-4 pr-0','classClasses' => 'col-md-6 mt-6 mt-md-0 pl-md-4 pl-0'])->html();
} elseif ($_instance->childHasBeenRendered('WlkkzNZ')) {
    $componentId = $_instance->getRenderedChildComponentId('WlkkzNZ');
    $componentTag = $_instance->getRenderedChildComponentTagName('WlkkzNZ');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('WlkkzNZ');
} else {
    $response = \Livewire\Livewire::mount('filters.school-and-class', ['classes' => 'row no-gutters col-md-8 my-3','schoolClasses' => 'col-md-6 mt-md-0 pr-md-4 pr-0','classClasses' => 'col-md-6 mt-6 mt-md-0 pl-md-4 pl-0']);
    $html = $response->html();
    $_instance->logRenderedChild('WlkkzNZ', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(_ => {
            let search = new URLSearchParams(window.location.search);

            let chances = search.has('chances_of_staying') ? (search.get('chances_of_staying')).split(';') : [0,10];
            try {
                chances[0] = +chances[0] < 0 ? 0 : +chances[0];
                chances[1] = +chances[1] > 10 ? 10 : +chances[1];
            } catch (e) {
                chances = [0,10];
            }

            $('#chances_of_staying').ionRangeSlider({
                type: "double",
                min: 0,
                max: 10,
                from: chances[0],
                to: chances[1],
            });
        })
    </script>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('css'); ?>
    <style>
        /* alla progress */
        .progress-success .irs--flat .irs-bar,
        .progress-success .irs--flat .irs-from,
        .progress-success .irs--flat .irs-to,
        .progress-success .irs--flat .irs-single,
        .progress-success .irs--flat .irs-handle > i:first-child {
            background-color: #1BC5BD;
        }

        .progress-success .irs--flat .irs-from:before,
        .progress-success .irs--flat .irs-to:before,
        .progress-success .irs--flat .irs-single:before {
            border-top-color: #1BC5BD;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php /**PATH D:\openserver\OpenServer\domains\prof\www\resources\views/employer/students/list/_list/_search.blade.php ENDPATH**/ ?>