<div class="my-3 col-md-4">
    <div class="form-group">
        <label class="mb-3">Итоговое соответствие модели компетенций Наставника</label>
        <div class="ion-range-slider progress-success">
            <input type="hidden" id="chances_of_staying" name="chances_of_staying"/>
        </div>
    </div>
</div>





















<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('filters.school-and-class', ['classes' => 'row no-gutters col-md-8 my-3','schoolClasses' => 'col-md-6 mt-md-0 pr-md-4 pr-0','classClasses' => 'col-md-6 mt-6 mt-md-0 pl-md-4 pl-0'])->html();
} elseif ($_instance->childHasBeenRendered('GD1Ed18')) {
    $componentId = $_instance->getRenderedChildComponentId('GD1Ed18');
    $componentTag = $_instance->getRenderedChildComponentTagName('GD1Ed18');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('GD1Ed18');
} else {
    $response = \Livewire\Livewire::mount('filters.school-and-class', ['classes' => 'row no-gutters col-md-8 my-3','schoolClasses' => 'col-md-6 mt-md-0 pr-md-4 pr-0','classClasses' => 'col-md-6 mt-6 mt-md-0 pl-md-4 pl-0']);
    $html = $response->html();
    $_instance->logRenderedChild('GD1Ed18', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(_ => {
            let search = new URLSearchParams(window.location.search);

            let chances = search.has('chances_of_staying') ? (search.get('chances_of_staying')).split(';') : [0,100];
            try {
                chances[0] = +chances[0] < 0 ? 0 : +chances[0];
                chances[1] = +chances[1] > 100 ? 100 : +chances[1];
            } catch (e) {
                chances = [0,100];
            }

            $('#chances_of_staying').ionRangeSlider({
                type: "double",
                min: 0,
                max: 100,
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
<?php /**PATH /home/c41010/mentor.na4u.ru/www/resources/views/employer/students/list/_list/_search.blade.php ENDPATH**/ ?>