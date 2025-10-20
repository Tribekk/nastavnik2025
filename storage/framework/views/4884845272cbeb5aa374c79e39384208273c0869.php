<?php $__currentLoopData = $types_of_thinking; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type_of_thinking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <table>
        <tr><td><?php echo e($type_of_thinking->title); ?></td><td width="5"></td>
            <td></td></tr>

        <?php $__currentLoopData = $type_of_thinking->manifestations()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type_think_manifest): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr><td>

                    <table>
                        <tr><td>

                                <input type="checkbox" name="deepTestItems[type_of_thinking][<?php echo e($type_think_manifest->id); ?>][<?php echo e($type); ?>]" value="1"

                                       <?php if(@$control_values['type_of_thinking'][$type_think_manifest->id][$type]==1): ?>
                                       checked selected
                                        <?php endif; ?>

                                >


                            </td><td><?php echo e($type_think_manifest->value_range); ?></td></tr>
                    </table>

                </td><td width="5"></td>
                <td><?php echo $type_think_manifest->title; ?> </td></tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
    <Br>


<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH /home/c41010/mentor.na4u.ru/www/resources/views/admin/user_profiles/include/deep_test_types_thinking.blade.php ENDPATH**/ ?>