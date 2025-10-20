<div class="mr-5 mb-5 order rounded shadow-sm p-10 w-100 md-w-50" xmlns:wire="http://www.w3.org/1999/xhtml">
    <div class="d-flex justify-content-between">
        <div>
            <h4 class="font-size-h3 font-hero-super mb-5">
                <?php if(($availableQuiz->quiz->isSuitableProfessions() && $availableQuiz->interestsQuizFinished() || !$availableQuiz->quiz->isSuitableProfessions()) && $availableQuiz->state->fillable()): ?>
                        <a class="link"
                            <?php if($availableQuiz->state->initial()): ?>
                            href="<?php echo e(route('quiz.description', $availableQuiz)); ?>"
                            <?php else: ?>
                            href="<?php echo e(route('quiz.show', $availableQuiz)); ?>"
                            <?php endif; ?>
                        >
                <?php endif; ?>
                    <?php echo e($availableQuiz->quiz->title); ?>

                <?php if(($availableQuiz->quiz->isSuitableProfessions() && $availableQuiz->interestsQuizFinished() || !$availableQuiz->quiz->isSuitableProfessions()) && $availableQuiz->state->fillable()): ?>
                    </a>
                <?php endif; ?>
            </h4>
            <?php if($availableQuiz->quiz->isSuitableProfessions() && !$availableQuiz->interestsQuizFinished()): ?>
                <div class="my-3">
                    <span class="text-primary">Для прохождения этого теста необходимо пройти тест «Интересы»</span>
                </div>
            <?php endif; ?>
        </div>
        <div>
            <span class="text-muted"><i class="la la-clock"></i> <?php echo e($availableQuiz->quiz->minutes); ?> минут</span>
        </div>
    </div>
    <div class="d-flex justify-content-between">
        <div class="mr-5">
            <div class="text-dark-50 font-size-lg font-hero mb-3">
                <?php echo e($availableQuiz->quiz->questionCount); ?> вопросов
            </div>
            <?php if($availableQuiz->state->fillable()): ?>
                <span class="text-dark-50 font-size-lg">
                    <?php echo e($availableQuiz->state->title()); ?>

                </span>
            <?php else: ?>
                <i class="la la-refresh"></i>
                <a href="#" class="link font-size-h3" wire:click.prevent="openQuiz">
                    Пройти снова
                </a>
            <?php endif; ?>
        </div>
        <div class="d-flex flex-column justify-content-around">
            <?php if($availableQuiz->state->fillable()): ?>
                <div class="text-dark-50 font-size-lg font-hero mb-3">
                    Заполнено на <?php echo e($availableQuiz->quiz->filledPercentage(Auth::user())); ?>%
                </div>
            <?php else: ?>
                <div class="text-dark-50 font-size-lg font-hero mb-3 min-w-md-150px text-center">
                    <?php echo e($availableQuiz->state->title()); ?><br/>
                    <small class="text-muted"><?php echo e($availableQuiz->finished_at->format('d.m.Y')); ?></small>
                </div>
            <?php endif; ?>

            <?php if($availableQuiz->canBeFinished() && $availableQuiz->state->fillable()): ?>
                <button class="btn btn-success btn-sm w-100" wire:click="finishQuiz">
                    Завершить
                </button>
            <?php endif; ?>

            <?php if (! ($availableQuiz->state->fillable())): ?>
                <a href="<?php echo e(route('quiz.result', $availableQuiz)); ?>" role="button" class="btn btn-sm btn-success">
                    Результаты
                </a>
            <?php endif; ?>

        </div>
    </div>
</div>
<?php /**PATH D:\openserver\OpenServer\domains\prof\www\resources\views/livewire/quiz/quiz-card.blade.php ENDPATH**/ ?>