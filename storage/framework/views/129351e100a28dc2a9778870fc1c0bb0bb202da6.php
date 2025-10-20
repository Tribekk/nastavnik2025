<div class="form-group mt-8">
    <label for="question_<?php echo e($questions->firstItem() + $index); ?>">Другое</label>
    <input type="<?php echo e($question->arbitraryAnswer->type); ?>"
           class="form-control form-control-solid h-auto py-4 px-6 rounded-lg"
           name="question_<?php echo e($questions->firstItem() + $index); ?>"
           id="question_<?php echo e($questions->firstItem() + $index); ?>"
           wire:change.prevent="answerTheQuestion(<?php echo e($question->id); ?>, <?php echo e($question->arbitraryAnswer->id); ?>, $event.target.value)"
           value="<?php echo e(optional($question->arbitraryAnswer->user(Auth::id()))->value ?? ""); ?>"
           maxlength="191"
           placeholder="Ответ">
</div>

<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function () {
            window.livewire.find('<?php echo e($_instance->id); ?>').on('clearAnswer<?php echo e($question->id); ?>.<?php echo e($question->arbitraryAnswer->id); ?>', _ => {
                 $("#question_<?php echo e($questions->firstItem() + $index); ?>").val("");
            });
        });
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH D:\openserver\OpenServer\domains\prof\www\resources\views/quiz/_run-quiz/_arbitrary-answer.blade.php ENDPATH**/ ?>