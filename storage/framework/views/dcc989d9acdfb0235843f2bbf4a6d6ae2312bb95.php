<div wire:click="answerTheQuestion(<?php echo e($question->id); ?>, <?php echo e($answer->id); ?>)"
     class="my-2 cursor-pointer d-flex w-100 hover-text-alla hover-opacity-90 <?php if($answer->madeByUser(Auth::id())): ?> font-alla <?php else: ?> text-dark-65 <?php endif; ?> font-size-sm-h4 font-size-h5 font-weight-bold">
    <?php echo e($answer->title); ?>

</div>
<?php /**PATH D:\openserver\OpenServer\domains\prof\www\resources\views/quiz/_run-quiz/_question-select-text-answer.blade.php ENDPATH**/ ?>