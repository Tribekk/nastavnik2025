<div class="row">
    <?php
        $colMd = "col-md-";
        $answersCount = $question->answers()->count();
        if($answersCount > 2) {
            if($answersCount % 3 == 0) $colMd .= "4";
            else if($answersCount % 4 == 0) $colMd .= "3";
            else $colMd .= "4";
        } else $colMd .= "12";
    ?>

    <?php $__currentLoopData = $question->answers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $answer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="<?php echo e($colMd); ?> my-2">
            <label class="checkbox font-size-sm-h4 checkbox-blue font-size-lg d-flex align-items-start align-content-start">
                <input
                    type="checkbox"
                    name="question_<?php echo e($questions->firstItem() + $index); ?>"
                    wire:click.prevent="answerTheQuestion(<?php echo e($question->id); ?>, <?php echo e($answer->id); ?>)"
                    <?php if($answer->madeByUser(Auth::id())): ?> checked <?php endif; ?>
                >
                <span class="mr-4 min-w-20px w-20px h-20px min-h-20px"></span><?php echo e($answer->title); ?>

            </label>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php /**PATH /home/c109133/nastavnik2025.na4u.ru/www/resources/views/quiz/_run-quiz/_question-checkbox.blade.php ENDPATH**/ ?>