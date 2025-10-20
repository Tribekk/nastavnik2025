<?php if($item->type()->first()->code=="abv" || $item->type()->first()->code=="select"
    or $item->type()->first()->code=="checkbox"

    ): ?>

    <?php $__currentLoopData = $item->answers()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $answer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <input type="checkbox" id="checkbox_<?php echo e($anketItems->first()->id); ?>_<?php echo e($answer->id); ?>" name="anketItems[<?php echo e($type); ?>][<?php echo e($answer->id); ?>]" value="1"

               <?php if(@$control_values[$type][$answer->id]==1): ?>
                   checked selected
                <?php endif; ?>

        >
        <label for="checkbox_<?php echo e($anketItems->first()->id); ?>_<?php echo e($answer->id); ?>"><?php echo e($answer->title); ?></label><br>



    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php endif; ?>

    <?php if($item->type()->first()->code=="radio"
    or $item->type()->first()->code=="yns"
    or $item->type()->first()->code=="yn"
    ): ?>

        <?php $__currentLoopData = $item->answers()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $answer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <input type="checkbox" id="radio_<?php echo e($anketItems->first()->id); ?>_<?php echo e($answer->id); ?>" name="anketItems[<?php echo e($type); ?>][<?php echo e($answer->id); ?>]" value="1"

                   <?php if(@$control_values[$type][$answer->id]==1): ?>
                   checked selected
                    <?php endif; ?>

            >
            <label for="radio_<?php echo e($anketItems->first()->id); ?>_<?php echo e($answer->id); ?>"><?php echo e($answer->title); ?></label><br>



        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php else: ?>

<?php endif; ?>
<?php /**PATH /home/c41010/mentor.na4u.ru/www/resources/views/admin/user_profiles/include/anket_items_question_form.blade.php ENDPATH**/ ?>