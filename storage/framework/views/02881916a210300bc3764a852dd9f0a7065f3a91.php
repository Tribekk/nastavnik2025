<?php $__env->startSection('subheader'); ?>
     <?php if (isset($component)) { $__componentOriginal94da708f5fed2e003e635f558c4309c9810b422b = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Subheader::class, ['title' => '','availableQuiz' => $availableQuiz,'withProgress' => true]); ?>
<?php $component->withName('subheader'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal94da708f5fed2e003e635f558c4309c9810b422b)): ?>
<?php $component = $__componentOriginal94da708f5fed2e003e635f558c4309c9810b422b; ?>
<?php unset($__componentOriginal94da708f5fed2e003e635f558c4309c9810b422b); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">





        <div class="row">
            <div class="col-xl-12">
                <div class="card card-custom gutter-b">

                    <div class="card-body">
                        <h3 class="font-pixel font-orange font-size-h1 mb-10">
                            <?php if($availableQuiz->quiz->type == "test"): ?>
                                Тест <?php echo e($availableQuiz->quiz->title); ?>

                            <?php else: ?>
                                <?php echo e($availableQuiz->quiz->title); ?>

                            <?php endif; ?>
                        </h3>

                        <div>
                            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('quiz.run-quiz', ['availableQuiz' => $availableQuiz])->html();
} elseif ($_instance->childHasBeenRendered('qSKcH79')) {
    $componentId = $_instance->getRenderedChildComponentId('qSKcH79');
    $componentTag = $_instance->getRenderedChildComponentTagName('qSKcH79');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('qSKcH79');
} else {
    $response = \Livewire\Livewire::mount('quiz.run-quiz', ['availableQuiz' => $availableQuiz]);
    $html = $response->html();
    $_instance->logRenderedChild('qSKcH79', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
    <style>
        .quiz-timer {
            position: fixed;
            position: -ms-device-fixed;
            z-index: 1;
            right: 0;
            display: flex;
            background: #fefefe;
            border-top-left-radius: 4px;
            border-bottom-left-radius: 4px;
            padding: 15px 25px;
            text-align: right;
            font-size: 18px;
            font-weight: bold;
            width: fit-content;
            width: -moz-fit-content;
            align-items: center;
            box-shadow: 0 0 30px 0 rgba(82, 63, 105, 0.1);
        }

        .quiz-timer__icon {
            font-size: 2rem;
            color: #C1121C;
        }

        .quiz-timer__value {
            margin-left: 12px;
            text-align: center;
            font-weight: bolder;
            font-size: 21px;
            color: #C1121C;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>

















<?php $__env->stopPush(); ?>

<?php echo $__env->make('layout.page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\openserver\OpenServer\domains\prof\www\resources\views/quiz/show.blade.php ENDPATH**/ ?>