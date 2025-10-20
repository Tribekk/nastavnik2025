<?php $__currentLoopData = $inclinations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inclination): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <table>
        <tr><td><?php echo e($inclination->title); ?></td><td width="5"></td>
        <td></td></tr>

        <?php $__currentLoopData = $inclination->types()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inclination_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr><td>

            <table>
                <tr><td>

                        <input type="checkbox" name="deepTestItems[inclinations][<?php echo e($inclination_type->id); ?>][<?php echo e($type); ?>]" value="1"

                               <?php if(@$control_values['inclinations'][$inclination_type->id][$type]==1): ?>
                               checked selected
                                <?php endif; ?>

                        >


                    </td><td><?php echo e($inclination_type->value_range); ?></td></tr>
            </table>

            </td><td width="5"></td>
            <td><?php echo e($inclination_type->title); ?></td></tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
    <Br>


<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH /home/c41010/mentor.na4u.ru/www/resources/views/admin/user_profiles/include/deep_test_inclinations_form.blade.php ENDPATH**/ ?>