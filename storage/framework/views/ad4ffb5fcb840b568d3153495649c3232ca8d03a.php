<?php $__currentLoopData = $values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="w-100 border shadow-sm mb-10 font-size-h3 p-md-10">
        <div class="mb-5">
            <span class="<?php echo e($value->question->required ? 'required' : ''); ?>">
                <?php echo e(($index + 1)); ?>.
                <?php echo e($value->question->content); ?>

            </span>

            <?php if($value->question->description): ?>
                <p class="text-dark-50 small font-size-h4"><?php echo $value->question->description; ?></p>
            <?php endif; ?>
        </div>

        <div class="">
            <div class="form-group">
                <?php
                    $questionValues = $wrapper->questionValues($value->question_id);
                    $questionValue = $questionValues[0];
                ?>

                <?php if($questionValue->question->type->code == 'text'): ?>
                    <?php echo $__env->make("quiz.questionnaire.answers._question-text", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php elseif($questionValue->question->type->code == 'select_city'): ?>
                    <?php echo $__env->make("quiz.questionnaire.answers._question-select_city", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php elseif($questionValue->question->type->code == 'radio'): ?>
                    <?php echo $__env->make("quiz.questionnaire.answers._question-radio", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php elseif($questionValue->question->type->code == 'radio'): ?>
                    <?php echo $__env->make("quiz.questionnaire.answers._question-radio", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php elseif($questionValue->question->type->code == 'checkbox'): ?>
                    <?php echo $__env->make("quiz.questionnaire.answers._question-checkbox", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>

                <?php
                  $questionArbitraryAnswer = $wrapper->questionArbitraryAnswer($value->question_id);
                ?>
                <?php if($questionArbitraryAnswer): ?>
                    <?php echo $__env->make("quiz.questionnaire.answers._arbitrary-answer", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH /home/c41010/mentor.na4u.ru/www/resources/views/quiz/questionnaire/questions.blade.php ENDPATH**/ ?>