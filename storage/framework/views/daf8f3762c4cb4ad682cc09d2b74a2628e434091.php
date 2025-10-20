<table><tr><td>

<label for="phys_prof_interest_green">Общие профессиональные характеристики</label>
        </td></tr></table>

            <br>

&nbsp;&nbsp;&nbsp;&nbsp; - &nbsp; c
<input type="number" min="0" max="100"
       name="baseTestItems[prof_characters][result][<?php echo e($type); ?>][start]"
       value="<?php echo e(@$control_values['prof_characters']['result'][$type]['start']); ?>" size="5">
по

<input  type="number" min="0" max="100"
        name="baseTestItems[prof_characters][result][<?php echo e($type); ?>][end]"
        value="<?php echo e(@$control_values['prof_characters']['result'][$type]['end']); ?>" size="5">

<br>
<br>

<?php $__currentLoopData = $ProfessionalTypeOfThinkingModelItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Professional): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <table>
        <tr>
            <td>
                <input type="checkbox"
                       name="baseTestItems[prof_characters][<?php echo e($Professional->short_title); ?>][<?php echo e($type); ?>][check]" value="1"
                       id="himbio_green"

                       <?php if(@$control_values['prof_characters'][$Professional->short_title][$type]['check']==1): ?>
                       checked selected
                    <?php endif; ?>

                >
            </td>
            <td>
                <label for="himbio_green"><?php echo e($Professional->title); ?></label>
            </td>
        </tr>
    </table><br>
    &nbsp;&nbsp;&nbsp;&nbsp; - &nbsp; c
    <input type="number" min="0" max="100"
           name="baseTestItems[prof_characters][<?php echo e($Professional->short_title); ?>][<?php echo e($type); ?>][start]"
           value="<?php echo e(@$control_values['prof_characters'][$Professional->short_title][$type]['start']); ?>" size="5">
    по

    <input type="number" min="0" max="100"
           name="baseTestItems[prof_characters][<?php echo e($Professional->short_title); ?>][<?php echo e($type); ?>][end]"
           value="<?php echo e(@$control_values['prof_characters'][$Professional->short_title][$type]['end']); ?>" size="5">

    <br>
    <br>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH /home/c41010/mentor.na4u.ru/www/resources/views/admin/user_profiles/include/base_test_profession_interests.blade.php ENDPATH**/ ?>