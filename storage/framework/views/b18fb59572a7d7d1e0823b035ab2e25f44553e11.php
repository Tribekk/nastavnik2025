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

                        <div class="col-md-6 p-0">
                            <div class="row">
                                <div class="col-md-7">
                                    <h4 class="font-size-h3 font-hero mb-5 bg-orange p-5 text-center border-radius rounded-pill text-white"
                                        style="background-color: #2D38FC !important;border-color: #2D38FC !important;">
                                        Анкета
                                    </h4>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('quiz.quiz-card', ['availableQuizId' => ''.e($questionnaire->id).''])->html();
} elseif ($_instance->childHasBeenRendered('7PJiM0z')) {
    $componentId = $_instance->getRenderedChildComponentId('7PJiM0z');
    $componentTag = $_instance->getRenderedChildComponentTagName('7PJiM0z');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('7PJiM0z');
} else {
    $response = \Livewire\Livewire::mount('quiz.quiz-card', ['availableQuizId' => ''.e($questionnaire->id).'']);
    $html = $response->html();
    $_instance->logRenderedChild('7PJiM0z', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
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
} elseif ($_instance->childHasBeenRendered('7UqI8Gv')) {
    $componentId = $_instance->getRenderedChildComponentId('7UqI8Gv');
    $componentTag = $_instance->getRenderedChildComponentTagName('7UqI8Gv');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('7UqI8Gv');
} else {
    $response = \Livewire\Livewire::mount('quiz.quiz-card', ['availableQuizId' => ''.e($availableQuiz->id).'']);
    $html = $response->html();
    $_instance->logRenderedChild('7UqI8Gv', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
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
} elseif ($_instance->childHasBeenRendered('be1ataZ')) {
    $componentId = $_instance->getRenderedChildComponentId('be1ataZ');
    $componentTag = $_instance->getRenderedChildComponentTagName('be1ataZ');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('be1ataZ');
} else {
    $response = \Livewire\Livewire::mount('quiz.quiz-card', ['availableQuizId' => ''.e($availableQuiz->id).'']);
    $html = $response->html();
    $_instance->logRenderedChild('be1ataZ', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
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
} elseif ($_instance->childHasBeenRendered('N912VrL')) {
    $componentId = $_instance->getRenderedChildComponentId('N912VrL');
    $componentTag = $_instance->getRenderedChildComponentTagName('N912VrL');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('N912VrL');
} else {
    $response = \Livewire\Livewire::mount('quiz.quiz-card', ['availableQuizId' => ''.e($availableQuiz->id).'']);
    $html = $response->html();
    $_instance->logRenderedChild('N912VrL', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
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
} elseif ($_instance->childHasBeenRendered('A3wzbc0')) {
    $componentId = $_instance->getRenderedChildComponentId('A3wzbc0');
    $componentTag = $_instance->getRenderedChildComponentTagName('A3wzbc0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('A3wzbc0');
} else {
    $response = \Livewire\Livewire::mount('quiz.quiz-card', ['availableQuizId' => ''.e($availableQuiz->id).'']);
    $html = $response->html();
    $_instance->logRenderedChild('A3wzbc0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
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

<?php echo $__env->make('layout.page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/c109133/nastavnik2025.na4u.ru/www/resources/views/quiz/index.blade.php ENDPATH**/ ?>