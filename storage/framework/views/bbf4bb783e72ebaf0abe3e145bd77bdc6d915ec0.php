<?php $__currentLoopData = $intellegens_levels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $intellegens_level): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <table>
        <tr><td><?php echo e($intellegens_level->title); ?></td><td width="5"></td>
            <td>

                <input type="checkbox" name="deepTestResults[intellegense_level][<?php echo e($intellegens_level->id); ?>][<?php echo e($type); ?>]" value="1"

                       <?php if(@$control_values['intellegense_level'][$intellegens_level->id][$type]==1): ?>
                       checked selected
                        <?php endif; ?>

                >


            </td></tr>


    </table>
    <Br>


<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH /home/c41010/mentor.na4u.ru/www/resources/views/admin/user_profiles/include/deep_result_intellegense_levels.blade.php ENDPATH**/ ?>