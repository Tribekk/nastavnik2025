<div>
    <div class="row">
        <?php $__currentLoopData = $availableQuiz->quiz->questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="border shadow-sm font-size-h3 p-10 text-center col-md-6 my-5">
                <div class="mb-2">
                    <?php echo e($question->content); ?>

                </div>
                <div class="mb-3">
                    <?php echo $question->description; ?>

                </div>
                <div class="mt-12">
                    <div class="form-group mb-0">
                        <div class="d-flex flex-wrap row justify-content-center">
                            <?php $__currentLoopData = $question->answers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $answer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div
                                    x-data="{hover: false}"
                                    x-on:mouseover="hover = true"
                                    x-on:mouseout="hover = false"
                                    class="<?php if($answer->madeByUser(Auth::id())): ?> selected <?php endif; ?> position-relative mx-md-2 mb-4 min-w-md-140px font-size-base p-1 cursor-pointer col-6 col-md-auto w-md-30"
                                    wire:click="switch(<?php echo e($question->id); ?>, <?php echo e($answer->id); ?>)">
                                    <?php if($answer->madeByUser(Auth::id())): ?>
                                        <img src="<?php echo e(asset('img/icons/' . $answer->answerable->selectedImage)); ?>" class="img-fluid">
                                    <?php else: ?>
                                        <img src="<?php echo e(asset('img/icons/' . $answer->answerable->notSelectedImage)); ?>" class="img-fluid">
                                    <?php endif; ?>
                                    <p class="font-size-lg font-weight-bold"><?php echo e($answer->title); ?></p>

                                    <div class="text-dark-50 font-size-lg text-left position-absolute max-w-140px bg-secondary px-4 py-5" x-show="hover" style="z-index: 2; left: -50px; top: 100px; border-radius: 5px;"><?php echo e($answer->answerable->description); ?></div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <div class="mt-10 d-flex flex-column flex-md-row justify-content-between">
        <div>
            <button class="btn btn-success font-size-h5" wire:click="finishQuiz">
                Определить мою профессию
            </button>
        </div>
    </div>
</div>
<?php /**PATH D:\openserver\OpenServer\domains\prof\www\resources\views/livewire/quiz/suitable-professions.blade.php ENDPATH**/ ?>