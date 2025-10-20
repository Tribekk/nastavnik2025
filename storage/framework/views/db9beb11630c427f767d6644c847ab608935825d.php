<tbody class="datatable-body">
<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr class="font-size-lg">
        <td class="fit">
            <?php echo e($users->firstItem() + $index); ?>

        </td>

        <td>
            <div class="d-flex align-items-center">
                <div class="symbol symbol-40 symbol-sm flex-shrink-0 d-none d-md-block">
                    <img src="<?php echo e($user->avatarUrl); ?>">
                </div>
                <div class="ml-4">
                    <a href="<?php echo e(route('quiz.results.student_questionnaire', $user)."?backTo=".urlencode(url()->full())); ?>" class="font-weight-bolder link">
                        <?php echo e($user->fullName); ?>

                        <?php if($user->birth_date): ?>
                            <br>
                            <span class="font-weight-normal"><?php echo e($user->birthDateFormatted); ?><?php if($user->fullYears): ?> (<?php echo e($user->fullYearsFormatted); ?>) <?php endif; ?></span>
                        <?php endif; ?>
                    </a>
                </div>
            </div>
        </td>

        <td>
            <?php echo e(optional($user->school)->short_title ?? '-'); ?>, <?php echo e(optional($user->class)->number ?? '-'); ?><?php echo e(optional($user->class)->letter ?? '-'); ?>

        </td>

        <td>
            <div class="text-primary mb-0"><?php echo e($user->studentQuestionnaireResult->created_at->format('d.m.Y')); ?><br/><?php echo e($user->studentQuestionnaireResult->created_at->format('H:i:s')); ?></div>
        </td>

        <td class="fit">
            <div class="actions d-flex text-center">
                <a href="<?php echo e(route('quiz.results.student_questionnaire', $user)."?backTo=".urlencode(url()->full())); ?>" class="btn btn-sm btn-default btn-text-primary btn-hover-primary btn-icon mr-2" title="<?php echo e(__('Просмотр')); ?>">
                    <span class="svg-icon svg-icon-md"><i class="la la-eye"></i></span>
                </a>
            </div>
        </td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</tbody>
<?php /**PATH /home/c41010/mentor.na4u.ru/www/resources/views/results/_student-questionnaire/_table-body.blade.php ENDPATH**/ ?>