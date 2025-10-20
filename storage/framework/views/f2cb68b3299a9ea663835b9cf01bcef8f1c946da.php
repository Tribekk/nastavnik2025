<?php $__env->startSection('subheader'); ?>
     <?php if (isset($component)) { $__componentOriginal94da708f5fed2e003e635f558c4309c9810b422b = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Subheader::class, ['title' => 'Профтрекер']); ?>
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
                        <h3 class="font-pixel font-dark font-size-h1 mb-10">
                            Пройдите тесты
                        </h3>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-7">
                                        <?php if($availableCasesQuizzes && $availableCasesQuizzes[0]->state->fillable()): ?>
                                            <button
                                               class="btn btn-info px-md-10 text-white py-4 px-5 font-size-h3 font-weight-bolder my-2 rounded-pill col-12">
                                                Личностные характеристики
                                            </button>
                                        <?php else: ?>
                                            <form action="<?php echo e(route('quiz.supplement', $availableCasesQuizzes[0])); ?>"
                                                  method="post">
                                                <?php echo csrf_field(); ?>
                                                <button
                                                    class="btn btn-info px-md-10 text-white py-4 px-5 font-size-h3 font-weight-bolder my-2 rounded-pill col-12">
                                                    Личностные характеристики
                                                </button>
                                            </form>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col-md-7">
                                    <div class="row align-items-center">
                                        <h4 class="font-size-h3 font-hero mb-5 bg-orange p-5 text-center border-radius rounded-pill text-white">
                                            Профессиональные характеристики
                                        </h4>
                                    </div>
                                </div>
                            </div>

                            
                            <div class="col-md-12">
                                <div class="col-md-9">
                                    <div class="row align-items-center">

                                            <?php $__currentLoopData = $availableCasesQuizzes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $availableQuiz): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('quiz.quiz-card', ['availableQuizId' => ''.e($availableQuiz->id).''])->html();
} elseif ($_instance->childHasBeenRendered('y2bxPmz')) {
    $componentId = $_instance->getRenderedChildComponentId('y2bxPmz');
    $componentTag = $_instance->getRenderedChildComponentTagName('y2bxPmz');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('y2bxPmz');
} else {
    $response = \Livewire\Livewire::mount('quiz.quiz-card', ['availableQuizId' => ''.e($availableQuiz->id).'']);
    $html = $response->html();
    $_instance->logRenderedChild('y2bxPmz', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </div>
                                </div>
                            </div>
                            

                            
                            <div class="col-md-6">
                                <div class="col-md-9">
                                    <div class="row align-items-center">

                                        <?php $__currentLoopData = $availablePersonalCharQuestionsQuizzes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $availableQuiz): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('quiz.quiz-card', ['availableQuizId' => ''.e($availableQuiz->id).''])->html();
} elseif ($_instance->childHasBeenRendered('RMCWaKw')) {
    $componentId = $_instance->getRenderedChildComponentId('RMCWaKw');
    $componentTag = $_instance->getRenderedChildComponentTagName('RMCWaKw');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('RMCWaKw');
} else {
    $response = \Livewire\Livewire::mount('quiz.quiz-card', ['availableQuizId' => ''.e($availableQuiz->id).'']);
    $html = $response->html();
    $_instance->logRenderedChild('RMCWaKw', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </div>
                                </div>
                            </div>
                            

                            
                            <div class="col-md-6">
                                <div class="col-md-9">
                                    <div class="row align-items-center">

                                        <?php $__currentLoopData = $availableProfCharQuestionsQuizzes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $availableQuiz): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('quiz.quiz-card', ['availableQuizId' => ''.e($availableQuiz->id).''])->html();
} elseif ($_instance->childHasBeenRendered('t4OyGbl')) {
    $componentId = $_instance->getRenderedChildComponentId('t4OyGbl');
    $componentTag = $_instance->getRenderedChildComponentTagName('t4OyGbl');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('t4OyGbl');
} else {
    $response = \Livewire\Livewire::mount('quiz.quiz-card', ['availableQuizId' => ''.e($availableQuiz->id).'']);
    $html = $response->html();
    $_instance->logRenderedChild('t4OyGbl', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                        

                        <?php if($availableDepthQuizzes->count()): ?>
                            <div class="mt-12" id="depth-tests">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-7">
                                                <h4 class="font-size-h4 font-hero mb-5 mt-10 mt-md-0 bg-alla p-5 text-center border-radius rounded-pill text-white">Углубленное тестирование</h4>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-column justify-content-between">
                                            <?php $__currentLoopData = $availableDepthQuizzes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $availableQuiz): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('quiz.quiz-card', ['availableQuizId' => ''.e($availableQuiz->id).''])->html();
} elseif ($_instance->childHasBeenRendered('lBQGgAb')) {
    $componentId = $_instance->getRenderedChildComponentId('lBQGgAb');
    $componentTag = $_instance->getRenderedChildComponentTagName('lBQGgAb');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('lBQGgAb');
} else {
    $response = \Livewire\Livewire::mount('quiz.quiz-card', ['availableQuizId' => ''.e($availableQuiz->id).'']);
    $html = $response->html();
    $_instance->logRenderedChild('lBQGgAb', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\openserver\OpenServer\domains\prof\www\resources\views/quiz/index.blade.php ENDPATH**/ ?>