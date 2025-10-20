
<table class="w-100">
    <tr>
        <td>Общие личностные характеристики</td>
    </tr>

    <tr><td class="text-center">

            с <input type="number" min="0" max="100"
                   name="baseTestItems[personal_characters][result][<?php echo e($type); ?>][start]"
                   value="<?php echo e(@$control_values['personal_characters']['result'][$type]["start"]); ?>" size="5">
            по

            <input  type="number" min="0" max="100"
                    name="baseTestItems[personal_characters][result][<?php echo e($type); ?>][end]"
                    value="<?php echo e(@$control_values['personal_characters']['result'][$type]["end"]); ?>" size="5">



        </td></tr>

</table>
<br>

<?php $__currentLoopData = $PersonalTypeOfThinkingModelItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $PersonalItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<table>
    <tr>
        <td>
            <input type="checkbox" name="baseTestItems[personal_characters][<?php echo e($PersonalItem->short_title); ?>][<?php echo e($type); ?>][check]" value="1"
                   id="phys_prof_interest_green"
                   <?php if(@$control_values['personal_characters'][$PersonalItem->short_title][$type]['check']==1): ?>
                   checked selected
                <?php endif; ?>
            >
        </td>
        <td>
            <label for="phys_prof_interest_green"><?php echo e($PersonalItem->title); ?></label>
        </td>
    </tr>
</table>
<br>
&nbsp;&nbsp;&nbsp;&nbsp; - &nbsp; c
<input type="number" min="0" max="100"
       name="baseTestItems[personal_characters][<?php echo e($PersonalItem->short_title); ?>][<?php echo e($type); ?>][start]"
       value="<?php echo e(@$control_values['personal_characters'][$PersonalItem->short_title][$type]['start']); ?>" size="5">
по
<input type="number" min="0" max="100"
       name="baseTestItems[personal_characters][<?php echo e($PersonalItem->short_title); ?>][<?php echo e($type); ?>][end]"
       value="<?php echo e(@$control_values['personal_characters'][$PersonalItem->short_title][$type]['end']); ?>" size="5">
<br><br>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH /home/c41010/mentor.na4u.ru/www/resources/views/admin/user_profiles/include/base_test_personal_characters.blade.php ENDPATH**/ ?>