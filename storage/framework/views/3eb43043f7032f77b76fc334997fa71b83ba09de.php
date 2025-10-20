<div>
    <?php if($availableQuiz->quiz->isSuitableProfessions()): ?>
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('quiz.suitable-professions', ['availableQuiz' => $availableQuiz])->html();
} elseif ($_instance->childHasBeenRendered('l2997598188-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l2997598188-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l2997598188-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l2997598188-0');
} else {
    $response = \Livewire\Livewire::mount('quiz.suitable-professions', ['availableQuiz' => $availableQuiz]);
    $html = $response->html();
    $_instance->logRenderedChild('l2997598188-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    <?php else: ?>
        <?php $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($question->isRequiredQuestion(Auth::id())): ?>
                <?php if($question->section_title): ?>
                    <div class="mt-15 mb-12 px-3">
                        <h2 class="font-size-h1 font-weight-bold font-blue mb-2"><?php echo e($question->section_title); ?></h2>
                        <?php if($question->section_caption): ?>
                            <p class="font-size-h5 text-dark-50"><?php echo e($question->section_caption); ?></p>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <div class="w-100 border shadow-sm mb-10 font-size-h3 p-2 p-md-10 ">
                    <div class="mb-5">
                        <span class="<?php echo e($question->required ? 'required' : ''); ?>"><?php echo e($questions->firstItem() + $index); ?>. <?php echo $question->content; ?></span>

                        <?php if($question->description): ?>
                            <p class="text-dark-50 small font-size-h4"><?php echo $question->description; ?></p>
                        <?php endif; ?>

                        <?php if($question->min_answers > 1): ?>
                            <?php
                                $count = $question->max_answers - $question->userAnswers(Auth::user())->count();
                            ?>

                            <?php if($count > 0): ?>
                                <p class="mb-3 font-alla font-size-h6">Осталось выбрать <?php echo e($count); ?> вариант(а,ов)</p>
                            <?php endif; ?>
                        <?php endif; ?>

                        <?php if($question->image_path): ?>
                            <div class="max-h-200px max-w-275px max-h-md-350px mt-4 mb-5 max-w-md-400px">
                                <img src="<?php echo e($question->image_path); ?>" alt="" class="img-fluid" style="max-height: -webkit-fill-available;">
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="">
                        <div class="form-group">
                            <?php if($question->type->code == 'text'): ?>
                                <?php echo $__env->make("quiz._run-quiz._question-text", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php elseif($question->type->code == 'select_city'): ?>
                                <?php echo $__env->make("quiz._run-quiz._question-select_city", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php elseif($question->type->code == 'select'): ?>
                                <?php echo $__env->make("quiz._run-quiz._question-select", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php elseif($question->type->code == 'image'): ?>
                                <?php echo $__env->make("quiz._run-quiz._question-image", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php elseif($question->type->code == 'checkbox'): ?>
                                <?php echo $__env->make("quiz._run-quiz._question-checkbox", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php elseif($question->type->code == 'radio'): ?>
                                <?php echo $__env->make("quiz._run-quiz._question-radio", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php else: ?>
                                <div class="flex-wrap radio-inline">
                                    <?php $__currentLoopData = $question->answers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $answer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <?php if($question->type->code == 'yns'): ?>
                                            <?php echo $__env->make("quiz._run-quiz._question-yns", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <?php elseif($question->type->code == 'circle'): ?>
                                            <?php echo $__env->make("quiz._run-quiz._question-circle", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <?php elseif($question->type->code == 'abv'): ?>
                                            <?php echo $__env->make("quiz._run-quiz._question-abv", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <?php elseif($question->type->code == 'btn-outline'): ?>
                                            <?php echo $__env->make("quiz._run-quiz._question-btn-outline", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <?php elseif($question->type->code == 'yn'): ?>
                                            <?php echo $__env->make("quiz._run-quiz._question-yn", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <?php elseif($question->type->code == 'select_text_answer'): ?>
                                            <?php echo $__env->make("quiz._run-quiz._question-select-text-answer", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <?php endif; ?>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            <?php endif; ?>

                            <?php if($question->arbitraryAnswer): ?>
                                <?php echo $__env->make('quiz._run-quiz._arbitrary-answer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php endif; ?>
                        </div>
                    </div>

                    <?php if($message = $this->questionError($index)): ?>
                        <div class="mt-4 font-size-lg">
                             <?php if (isset($component)) { $__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Alert::class, ['type' => 'danger','text' => ''.e($message).'']); ?>
<?php $component->withName('alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php if (isset($__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975)): ?>
<?php $component = $__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975; ?>
<?php unset($__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <div class="mt-10 d-flex flex-column flex-md-row justify-content-between">
            <div>
                <?php echo e($questions->links()); ?>

            </div>

            <?php if(env('APP_ENV', 'production') !== 'production'): ?>
                <div class="mt-3 mt-md-0">
                    <button class="btn btn-secondary font-size-h5" wire:click="generateAnswers">
                        <i class="la la-dice-d6"></i>
                        Сгенерировать
                    </button>
                </div>
            <?php endif; ?>

            <?php if(($availableQuiz->quiz->slug != "interests" && $availableQuiz->canAnsweredAllQuestions()) || !$questions->hasMorePages()): ?>
                <div class="mt-3 mt-md-0">
                    <button class="btn btn-success font-size-h5" wire:click="finishQuiz"><i class="la la-check"></i>
                        Завершить
                    </button>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</div>

<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function () {
            window.livewire.on('showQuestionErrors', errors => {
                let message = "";
                errors.forEach(error => {
                    const perPage = <?php echo e($questions->perPage()); ?>;

                    let page = 1;
                    for(let i = 0; i < error.question_index; i++) {
                        if((i+1) % perPage === 0) page++;
                    }

                    message += `<a href="<?php echo e(route('quiz.show', ['availableQuiz' => $this->availableQuizId])); ?>?page=${page}" class="my-3 fit text-left d-block cursor-pointer text-danger hover-opacity-50 font-weight-bold">${error.message}</a>`
                })

                Swal.fire({
                    title: '<h2 class="text-primary font-size-h2 font-weight-bold">Не удалось завершить!</h2>',
                    html: message,
                    width: 600,
                    confirmButtonColor: 'var(--success)',
                    confirmButtonText: 'Закрыть',

                });
            });
        });
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/c41010/mentor.na4u.ru/www/resources/views/livewire/quiz/run-quiz.blade.php ENDPATH**/ ?>