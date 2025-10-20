<tbody class="datatable-body">
<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php
        $parent = null;
        $observer = $user->observers()->first();
        if($observer) {
            $parent = $observer->user;
        }
    ?>


    <?php
        $consultation = $user->consultations()->orderBy('consultations.created_at')->first();
    ?>


    <tr class="font-size-lg">
        <td class="fit">
            <?php echo e($users->firstItem() + $index); ?>

        </td>

        <td>
            <div class="d-flex align-items-center min-w-150px max-w-150px">
                <div class="symbol symbol-40 symbol-sm flex-shrink-0 d-none d-md-block">
                    <img src="<?php echo e($user->avatarUrl); ?>">
                </div>
                <div class="ml-4">
                    <a href="<?php echo e(route('admin.users.edit', $user)); ?>" class="text-dark text-hover-primary font-weight-bolder mb-0">
                        <?php echo e($user->fullName); ?>

                    </a>
                </div>
            </div>
        </td>
        <td>
            <div class="max-w-150px min-w-100px">
                <?php echo e(optional($user->school)->short_title ?? 'компания не указана'); ?>, <?php if($user->class): ?> <?php echo e($user->class->number); ?><?php echo e($user->class->letter); ?> <?php else: ?> структурное подразделение не указано <?php endif; ?>
            </div>
        </td>

        <td>
            <?php if($user->phone): ?>
                <div class="link cursor-pointer" onclick="$.sendSmsDialog('<?php echo e($user->phone); ?>')"><?php echo e($user->phone); ?></div>
            <?php else: ?>
                <i class="la la-minus text-muted"></i>
            <?php endif; ?>
        </td>

        <td>
            <?php if($user->email): ?>
                <a target="_blank" class="link cursor-pointer" href="mailto:<?php echo e($user->email); ?>"><?php echo e($user->email); ?></a>
            <?php else: ?>
                <i class="la la-minus text-muted"></i>
            <?php endif; ?>
        </td>


        <td class="text-nowrap">
            <?php if($user->finishedBaseTests && $parent): ?>
                <div class="text-success">Выполнен базовый этап</div>
            <?php else: ?>
                <?php if(!$user->studentQuestionnaireFinished): ?> <div class="text-primary">Нет анкеты</div> <?php endif; ?>
                <?php if(!$parent): ?> <div class="text-primary">Не прикреплены родители</div> <?php endif; ?>
                <?php if($user->countNotFinishedBaseTests): ?><div class="text-primary">Нет базового теста</div> <?php endif; ?>
            <?php endif; ?>
        </td>

        <td>
            <?php if($user->hasDepthTests()): ?>
                <?php if($user->finishedDepthTests): ?>
                    <span class="text-success"><?php echo e($user->sex == 1 ? 'Прошел' : 'Прошла'); ?></span>
                <?php else: ?>
                    <span class="text-muted"><?php echo e($user->sex == 1 ? 'Приглашен' : 'Приглашена'); ?></span>
                <?php endif; ?>
            <?php else: ?>
                <?php if($user->finishedBaseTests): ?>
                    <form action="<?php echo e(route('employer.students.invite.depth_test', $user)); ?>" class="w-125px" method="post">
                        <?php echo csrf_field(); ?>
                        <button class="btn btn-success">
                            <i class="la la-plus"></i>
                            пригласить
                        </button>
                    </form>
                <?php else: ?>
                    <i class="la la-minus text-muted"></i>
                <?php endif; ?>
            <?php endif; ?>
        </td>

        <td class="text-nowrap">
            <?php if($consultation): ?>
                <?php if($consultation->state->is(\Domain\Consultation\States\CarriedOutConsultationState::class)): ?>
                    <div class="text-success"><?php echo e($user->sex == 1 ? 'Прошел консультацию' : 'Прошла консультацию'); ?></div>
                <?php else: ?>
                    <div class="text-muted"><?php echo e($user->sex == 1 ? 'Приглашен' : 'Приглашена'); ?></div>
                <?php endif; ?>

                <?php if($consultation->result): ?>
                    <?php if($consultation->result->recommend == 'recommend'): ?>
                        <div class="text-success"><?php echo e($user->sex == 1 ? 'Рекомендован' : 'Рекомендована'); ?></div>
                    <?php else: ?>
                        <div class="text-primary"><?php echo e($user->sex == 1 ? 'Не рекомендован' : 'Не рекомендована'); ?></div>
                    <?php endif; ?>
                <?php endif; ?>
            <?php else: ?>
                <i class="la la-minus text-muted"></i>
            <?php endif; ?>
        </td>

        <td>
            <?php if($parent): ?>
                <div class="d-flex align-items-center min-w-150px max-w-150px">
                    <div class="symbol symbol-40 symbol-sm flex-shrink-0 d-none d-md-block">
                        <img src="<?php echo e($parent->avatarUrl); ?>">
                    </div>
                    <div class="ml-4">
                        <a href="<?php echo e(route('admin.users.edit', $parent)); ?>" class="text-dark text-hover-primary font-weight-bolder mb-0">
                            <?php echo e($parent->fullName); ?>

                        </a>
                    </div>
                </div>
            <?php else: ?>
                <i class="la la-minus text-muted"></i>
            <?php endif; ?>
        </td>

        <td>
            <?php if($parent && $parent->phone): ?>
                <div class="link cursor-pointer" onclick="$.sendSmsDialog('<?php echo e($parent->phone); ?>')"><?php echo e($parent->phone); ?></div>
            <?php else: ?>
                <i class="la la-minus text-muted"></i>
            <?php endif; ?>
        </td>

        <td class="fit">
            <?php if($parent && $parent->parentQuestionnaireFinished): ?>
                <i class="la la-check text-success"></i>
            <?php else: ?>
                <i class="la la-minus text-muted"></i>
            <?php endif; ?>
        </td>

        <td class="fit">
            <?php if($user->studentQuestionnaireFinished): ?>
                <i class="la la-check text-success"></i>
            <?php else: ?>
                <i class="la la-minus text-muted"></i>
            <?php endif; ?>
        </td>
        <td class="fit">
            <?php if($user->characterTraitQuizFinished): ?>
                <i class="la la-check text-success"></i>
            <?php else: ?>
                <i class="la la-minus text-muted"></i>
            <?php endif; ?>
        </td>
        <td class="fit">
            <?php if($user->interestsQuizFinished): ?>
                <i class="la la-check text-success"></i>
            <?php else: ?>
                <i class="la la-minus text-muted"></i>
            <?php endif; ?>
        </td>
        <td class="fit">
            <?php if($user->suitableProfessionsQuizFinished): ?>
                <i class="la la-check text-success"></i>
            <?php else: ?>
                <i class="la la-minus text-muted"></i>
            <?php endif; ?>
        </td>

        <td class="fit">
            <?php if($user->inclinationQuizFinished): ?>
                <i class="la la-check text-success"></i>
            <?php else: ?>
                <i class="la la-minus text-muted"></i>
            <?php endif; ?>
        </td>

        <td class="fit">
            <?php if($user->intelligenceLevelQuizFinished): ?>
                <i class="la la-check text-success"></i>
            <?php else: ?>
                <i class="la la-minus text-muted"></i>
            <?php endif; ?>
        </td>

        <td class="fit">
            <?php if($user->typeThinkingQuizFinished): ?>
                <i class="la la-check text-success"></i>
            <?php else: ?>
                <i class="la la-minus text-muted"></i>
            <?php endif; ?>
        </td>

        <td class="fit">
            <?php if($user->solutionCasesQuizFinished): ?>
                <i class="la la-check text-success"></i>
            <?php else: ?>
                <i class="la la-minus text-muted"></i>
            <?php endif; ?>
        </td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</tbody>
<?php /**PATH /home/c41010/mentor.na4u.ru/www/resources/views/admin/reports/_students/_table-body.blade.php ENDPATH**/ ?>