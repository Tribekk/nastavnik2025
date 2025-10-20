<input type="<?php echo e($question->answers[0]->type); ?>"
       class="form-control form-control-solid h-auto py-4 px-6 rounded-lg"
       name="question_<?php echo e($questions->firstItem() + $index); ?>"
       id="question_<?php echo e($questions->firstItem() + $index); ?>"
       value="<?php echo e(optional($question->answers[0]->user(Auth::id()))->value ?? ""); ?>"
       maxlength="191"
       <?php if($question->answers[0]->type == "date"): ?>
           readonly
        <?php else: ?>
       wire:change="answerTheQuestion(<?php echo e($question->id); ?>, <?php echo e($question->answers[0]->id); ?>, $event.target.value)"
       <?php endif; ?>

       placeholder="<?php echo e($question->answers[0]->title ?? 'Ответ'); ?>">

<?php $__env->startPush('scripts'); ?>
    <script>
        <?php if($question->answers[0]->type == "date"): ?>
            $(document).ready(function() {
                var arrows;
                if (KTUtil.isRTL()) {
                    arrows = {
                        leftArrow: '<i class="la la-angle-right"></i>',
                        rightArrow: '<i class="la la-angle-left"></i>'
                    }
                } else {
                    arrows = {
                        leftArrow: '<i class="la la-angle-left"></i>',
                        rightArrow: '<i class="la la-angle-right"></i>'
                    }
                }

                // minimum setup
                $('#question_<?php echo e($questions->firstItem() + $index); ?>').datepicker({
                    language: 'ru',
                    rtl: false,
                    todayHighlight: true,
                    orientation: "bottom left",
                    templates: arrows,
                    clearBtn: true,
                    format: 'yyyy-mm-dd',
                }).on('changeDate', function(e) {
                    window.livewire.find('<?php echo e($_instance->id); ?>').call('answerTheQuestion',
                        <?php echo e($question->id); ?>,
                        <?php echo e($question->answers[0]->id); ?>,
                        e.target.value
                    );

                    $('#question_<?php echo e($questions->firstItem() + $index); ?>').datepicker('hide');
                });
            });
        <?php endif; ?>
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH D:\openserver\OpenServer\domains\prof\www\resources\views/quiz/_run-quiz/_question-text.blade.php ENDPATH**/ ?>