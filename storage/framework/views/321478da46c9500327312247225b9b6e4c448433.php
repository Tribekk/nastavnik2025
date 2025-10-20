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
                    <a href="<?php echo e(route('quiz.results.parent_questionnaire', $user)."?backTo=".urlencode(url()->full())); ?>" class="font-weight-bolder link">
                        <?php echo e($user->fullName); ?>

                    </a>
                </div>
            </div>
        </td>

        <td>
            <?php if($user && $user->phone): ?>
                <div class="link cursor-pointer" onclick="$.sendSmsDialog('<?php echo e($user->phone); ?>')"><?php echo e($user->phone); ?></div>
            <?php else: ?>
                <i class="la la-minus text-muted"></i>
            <?php endif; ?>
        </td>

        <td>
            <?php echo e(optional($user->school)->short_title ?? 'не указана'); ?>

        </td>

        <td>
            <?php if($user->parentQuestionnaireFinished): ?>
                <div class="text-success">Анкета завершена</div>
            <?php else: ?>
                <div class="text-primary">Анкета не завершена</div>
            <?php endif; ?>
        </td>

        <td>
            <?php if($user->observedUsers && count($user->observedUsers)): ?>
                Да
            <?php else: ?>
                Нет
            <?php endif; ?>
        </td>

        <td>
            <?php if($user->parentQuestionnaireFinished): ?>
                <div class="text-primary mb-0"><?php echo e($user->parentQuestionnaireResult->created_at->format('d.m.Y')); ?><br/><?php echo e($user->parentQuestionnaireResult->created_at->format('H:i:s')); ?></div>
            <?php else: ?>
                <div class="text-primary mb-0">-</div>
            <?php endif; ?>
        </td>

        <td class="fit">
            <div class="actions d-flex text-center">
                <a href="<?php echo e(route('quiz.results.parent_questionnaire', $user)."?backTo=".urlencode(url()->full())); ?>" class="btn btn-sm btn-default btn-text-primary btn-hover-primary btn-icon mr-2 <?php if(!$user->parentQuestionnaireFinished): ?> disabled <?php endif; ?>" title="<?php echo e(__('Просмотр')); ?>">
                    <span class="svg-icon svg-icon-md"><i class="la la-eye"></i></span>
                </a>
            </div>
        </td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</tbody>
<?php /**PATH /home/c41010/mentor.na4u.ru/www/resources/views/results/_parent-questionnaire/_table-body.blade.php ENDPATH**/ ?>