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
<?php
//dd($availableQuizzes);
$questionnaire = Auth::user()
            ->availableQuizzes()
            ->whereHas('quiz', function ($q) {
                $q->where('quiz_id', 14);
            })->first();

?>
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
                                    <button
                                            class="btn btn-info px-md-10 text-white py-4 px-5 font-size-h3 font-weight-bolder my-2 rounded-pill col-12" style="line-height: 1.2;background-color: #2D38FC !important;border-color: #2D38FC">
                                        Анкета
                                    </button>
                                </div>
                            </div>
                        </div>
                        </div>
                            <div class="col-md-12 p-0">
                            <div class="row align-items-center">
                                    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('quiz.quiz-card', ['availableQuizId' => ''.e($questionnaire->id).''])->html();
} elseif ($_instance->childHasBeenRendered('gL5o6fI')) {
    $componentId = $_instance->getRenderedChildComponentId('gL5o6fI');
    $componentTag = $_instance->getRenderedChildComponentTagName('gL5o6fI');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('gL5o6fI');
} else {
    $response = \Livewire\Livewire::mount('quiz.quiz-card', ['availableQuizId' => ''.e($questionnaire->id).'']);
    $html = $response->html();
    $_instance->logRenderedChild('gL5o6fI', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-7">
                                        <?php if($availableCasesQuizzes && $availableCasesQuizzes[0]->state->fillable()): ?>
                                            <button
                                               class="btn btn-info px-md-10 text-white py-4 px-5 font-size-h3 font-weight-bolder my-2 rounded-pill col-12" style="line-height: 1.2">
                                                Личностные характеристики
                                            </button>
                                        <?php else: ?>
                                            <h4 class="font-size-h3 font-hero mb-5 bg-orange p-5 text-center border-radius rounded-pill text-white" style="background-color: #8073e1 !important;border-color: #8073e1 !important;">
                                                Личностные характеристики
                                            </h4>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col-md-7">
                                    <div class="row align-items-center">
                                        <h4 class="font-size-h3 font-hero mb-5 bg-green p-5 text-center border-radius rounded-pill text-white">
                                            Профессиональные характеристики
                                        </h4>
                                    </div>
                                </div>
                            </div>

                            
                            <div class="col-md-12">
                                <div class="row align-items-center personal">
                                    <?php $__currentLoopData = $availableCasesQuizzes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $availableQuiz): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('quiz.quiz-card', ['availableQuizId' => ''.e($availableQuiz->id).''])->html();
} elseif ($_instance->childHasBeenRendered('1rK6XOD')) {
    $componentId = $_instance->getRenderedChildComponentId('1rK6XOD');
    $componentTag = $_instance->getRenderedChildComponentTagName('1rK6XOD');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('1rK6XOD');
} else {
    $response = \Livewire\Livewire::mount('quiz.quiz-card', ['availableQuizId' => ''.e($availableQuiz->id).'']);
    $html = $response->html();
    $_instance->logRenderedChild('1rK6XOD', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                            

                            
                            <div class="col-md-6">
                                <div class="row align-items-center personal">
                                    <?php $__currentLoopData = $availablePersonalCharQuestionsQuizzes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $availableQuiz): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('quiz.quiz-card', ['availableQuizId' => ''.e($availableQuiz->id).''])->html();
} elseif ($_instance->childHasBeenRendered('mApAxLq')) {
    $componentId = $_instance->getRenderedChildComponentId('mApAxLq');
    $componentTag = $_instance->getRenderedChildComponentTagName('mApAxLq');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('mApAxLq');
} else {
    $response = \Livewire\Livewire::mount('quiz.quiz-card', ['availableQuizId' => ''.e($availableQuiz->id).'']);
    $html = $response->html();
    $_instance->logRenderedChild('mApAxLq', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                            

                            
                            <div class="col-md-6">

                                    <div class="row align-items-center professional">

                                        <?php $__currentLoopData = $availableProfCharQuestionsQuizzes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $availableQuiz): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('quiz.quiz-card', ['availableQuizId' => ''.e($availableQuiz->id).''])->html();
} elseif ($_instance->childHasBeenRendered('JYmggCx')) {
    $componentId = $_instance->getRenderedChildComponentId('JYmggCx');
    $componentTag = $_instance->getRenderedChildComponentTagName('JYmggCx');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('JYmggCx');
} else {
    $response = \Livewire\Livewire::mount('quiz.quiz-card', ['availableQuizId' => ''.e($availableQuiz->id).'']);
    $html = $response->html();
    $_instance->logRenderedChild('JYmggCx', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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
} elseif ($_instance->childHasBeenRendered('bw5MoMq')) {
    $componentId = $_instance->getRenderedChildComponentId('bw5MoMq');
    $componentTag = $_instance->getRenderedChildComponentTagName('bw5MoMq');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('bw5MoMq');
} else {
    $response = \Livewire\Livewire::mount('quiz.quiz-card', ['availableQuizId' => ''.e($availableQuiz->id).'']);
    $html = $response->html();
    $_instance->logRenderedChild('bw5MoMq', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
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

<?php echo $__env->make('layout.page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/c41010/mentor.na4u.ru/www/resources/views/quiz/index.blade.php ENDPATH**/ ?>