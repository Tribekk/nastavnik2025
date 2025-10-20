<div wire:click="answerTheQuestion(<?php echo e($question->id); ?>, <?php echo e($answer->id); ?>)"
     class="rounded-pill py-4 px-10 w-100 text-md-left text-center m-3 cursor-pointer btn <?php if($answer->madeByUser(Auth::id())): ?> btn-success <?php else: ?> btn-outline-success <?php endif; ?> font-size-sm-h4 font-size-lg">
    <?php echo e($answer->title); ?>

</div>
<?php /**PATH D:\openserver\OpenServer\domains\prof\www\resources\views/quiz/_run-quiz/_question-abv.blade.php ENDPATH**/ ?>