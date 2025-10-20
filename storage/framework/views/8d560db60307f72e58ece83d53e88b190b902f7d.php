<select class="form-control form-control-solid h-auto py-4 px-6 rounded-lg"
        wire:change="answerTheQuestionSelect(<?php echo e($question->id); ?>, $event.target.value)"
        name="question_<?php echo e($questions->firstItem() + $index); ?>"
        id="question_<?php echo e($questions->firstItem() + $index); ?>">

    <option <?php if(!$question->answeredByUser(Auth::id())): ?> selected <?php endif; ?> disabled>Не выбрано</option>
    <?php $__currentLoopData = $question->answers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $answer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <option value="<?php echo e($answer->id ?? $answer->title); ?>"
                <?php if($answer->madeByUser(Auth::id())): ?> selected <?php endif; ?>><?php echo e($answer->title); ?>

        </option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>
<?php /**PATH /home/c41010/mentor.na4u.ru/www/resources/views/quiz/_run-quiz/_question-select.blade.php ENDPATH**/ ?>