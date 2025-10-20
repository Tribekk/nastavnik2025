<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('components.select-city', ['name' => 'question_'.e($questions->firstItem() + $index).'','id' => 'city','url' => ''.e(route('kladr.cities', ['country' => 'rus'])).'','event' => 'setCityQuestion','placeholder' => ''.e(__('Укажите город')).'','selected' => ''.e(optional($question->answers[0]->user(Auth::id()))->value ?? null).'','selectedItemUrl' => '/kladr/cities'])->html();
} elseif ($_instance->childHasBeenRendered('l3414173700-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l3414173700-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l3414173700-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l3414173700-0');
} else {
    $response = \Livewire\Livewire::mount('components.select-city', ['name' => 'question_'.e($questions->firstItem() + $index).'','id' => 'city','url' => ''.e(route('kladr.cities', ['country' => 'rus'])).'','event' => 'setCityQuestion','placeholder' => ''.e(__('Укажите город')).'','selected' => ''.e(optional($question->answers[0]->user(Auth::id()))->value ?? null).'','selectedItemUrl' => '/kladr/cities']);
    $html = $response->html();
    $_instance->logRenderedChild('l3414173700-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function () {

            window.livewire.on('setCityQuestion', cityCode => {
                if(cityCode.toString() !== 'undefined') {
                    window.livewire.find('<?php echo e($_instance->id); ?>').call('answerTheQuestion', <?php echo e($question->id); ?>, <?php echo e($question->answers[0]->id); ?>, cityCode);
                }
            });
        });
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH D:\openserver\OpenServer\domains\prof\www\resources\views/quiz/_run-quiz/_question-select_city.blade.php ENDPATH**/ ?>