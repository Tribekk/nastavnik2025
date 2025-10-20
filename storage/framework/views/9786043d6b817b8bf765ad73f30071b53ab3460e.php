<?php $__currentLoopData = $intellegens_levels_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $intellegens_levels_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <table>
        <tr><td><?php echo e($intellegens_levels_type->title); ?></td><td width="5"></td>
            <td>

                <input type="checkbox" name="deepTestResults[intellegens_levels_type][<?php echo e($intellegens_levels_type->id); ?>][<?php echo e($type); ?>]" value="1"

                       <?php if(@$control_values['intellegens_levels_type'][$intellegens_levels_type->id][$type]==1): ?>
                       checked selected
                        <?php endif; ?>

                >


            </td></tr>


    </table>
    <Br>


<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH /home/c41010/mentor.na4u.ru/www/resources/views/admin/user_profiles/include/deep_result_intellegense_levels_types.blade.php ENDPATH**/ ?>