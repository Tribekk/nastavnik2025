<?php $__currentLoopData = $situations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $situation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <table>
        <tr><td><b><?php echo e($situation->title); ?></b><Br><br><?php echo e($situation->content); ?></td><td width="5"></td>
            <td></td></tr>

        <?php $__currentLoopData = $situation->situation_interpretations()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $situation_interpretation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr><td>

                    <table>
                        <tr><td>

                                <input type="checkbox" name="deepTestItems[situation][<?php echo e($situation_interpretation->id); ?>][<?php echo e($type); ?>]" value="1"

                                       <?php if(@$control_values['situation'][$situation_interpretation->id][$type]==1): ?>
                                       checked selected
                                        <?php endif; ?>

                                >


                            </td><td></td></tr>
                    </table>

                </td><td width="5"></td>
                <td><?php echo $situation_interpretation->content; ?> </td></tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
    <Br>


<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH /home/c41010/mentor.na4u.ru/www/resources/views/admin/user_profiles/include/deep_test_situations.blade.php ENDPATH**/ ?>