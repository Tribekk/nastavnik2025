<tbody class="datatable-body">
<?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td class="fit">
            <?php echo e($index + 1); ?>

        </td>

        <td>
            <span class="font-size-h5"><?php echo e($student->fullName); ?></span>
        </td>

        <td>
            <span class="font-size-h5"><?php echo e($student->birthDateFormatted); ?> <?php if($student->fullYears > 0): ?> (<?php echo e($student->fullYearsFormatted); ?>) <?php endif; ?></span>
        </td>

        <td>
            <?php if($student->studentQuestionnaireFinished): ?>
                <span class="font-size-h5 text-success">Да</span>
            <?php else: ?>
                <span class="font-size-h5 text-primary">Нет</span>
            <?php endif; ?>
        </td>

        <td class="">
            <?php echo $wrapper->studentBaseTestStatus($student); ?>

        </td>

        <!--<td>-->
        <!--    <?php if($student->suitableProfessionsQuizFinished && $student->interestsQuizFinished): ?>-->
        <!--        <?php $__empty_1 = true; $__currentLoopData = $student->personTypes(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>-->
        <!--            <a href="#" class="font-size-h5 link text-nowrap" data-toggle="modal" data-target="#personType_<?php echo e($student->id); ?>_<?php echo e($type->id); ?>">-->
        <!--                <?php echo e($type->type->title); ?> <span class="font-weight-normal">(<?php echo e($type->value); ?>)</span>-->
        <!--            </a>-->
        <!--            <br>-->

                    <!-- Modal-->
        <!--            <div class="modal fade" id="personType_<?php echo e($student->id); ?>_<?php echo e($type->id); ?>" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">-->
        <!--                <div class="modal-dialog modal-dialog-centered" role="document">-->
        <!--                    <div class="modal-content">-->
        <!--                        <div class="modal-header">-->
        <!--                            <h5 class="modal-title font-size-h3 font-weight-bold" id="personType_<?php echo e($student->id); ?>_<?php echo e($type->id); ?>"><?php echo e($type->type->title); ?></h5>-->
        <!--                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
        <!--                                <i aria-hidden="true" class="ki ki-close"></i>-->
        <!--                            </button>-->
        <!--                        </div>-->
        <!--                        <div class="modal-body">-->
        <!--                            <h4 class="font-size-h5 font-weight-bold mb-3">Рекомендуемые профессии:</h4>-->
        <!--                            <div class="font-size-h5">-->
        <!--                                <?php $__currentLoopData = $type->type->professions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $profession): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>-->
        <!--                                    <div class="my-2 font-weight-normal text-nowrap"><?php echo $profession->title; ?></div>-->
        <!--                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>-->
        <!--                            </div>-->

        <!--                            <div class="font-size-h5 font-weight-bold mt-3">Набрано: <span class="font-blue"><?php echo e($type->value); ?> <?php echo e(num2word($type->value, ['балл', 'балла', 'баллов'])); ?></span></div>-->
        <!--                        </div>-->
        <!--                        <div class="modal-footer">-->
        <!--                            <button type="button" class="btn btn-success" data-dismiss="modal">Закрыть</button>-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>-->
        <!--            <div class="col-md-12">-->
        <!--                <div class="font-size-h6 min-w-250px">Типаж не выражен</div>-->
        <!--            </div>-->
        <!--        <?php endif; ?>-->
        <!--    <?php else: ?>-->
        <!--        <div class="font-size-h6 min-w-250px">Тест &laquo;Интересы&raquo; и(или) &laquo;Подходящие профессии&raquo; еще не пройден(ы)</div>-->
        <!--    <?php endif; ?>-->
        <!--</td>-->

        <!--<td>-->
        <!--    <?php if($student->characterTraitQuizFinished): ?>-->
        <!--        <div class="text-nowrap">-->
        <!--            <?php $__currentLoopData = $student->characterTraitResult->values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>-->
        <!--                <div class="font-size-h6 <?php echo e($value->is_higher ? 'text-warning' : 'font-alla'); ?>"><b><?php echo e($value->title); ?></b> - <?php echo e($value->percentage); ?>%</div>-->
        <!--            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>-->
        <!--        </div>-->
        <!--    <?php else: ?>-->
        <!--        <div class="font-size-h6 min-w-250px">Тест &laquo;Особенности характера&raquo; еще не пройден</div>-->
        <!--    <?php endif; ?>-->
        <!--</td>-->

        <!--<td>-->
        <!--    <?php if($student->suitableProfessionsQuizFinished): ?>-->
        <!--        <div class="font-size-h6 font-weight-bold text-nowrap">-->
        <!--            "<?php echo e($student->suitableProfessions->careerMatrix->activityObject->title); ?>" + "<?php echo e($student->suitableProfessions->careerMatrix->activityKind->title); ?>"-->
        <!--        </div>-->
        <!--    <?php else: ?>-->
        <!--        <div class="font-size-h6 min-w-250px">Тест &laquo;Подходящие профессии&raquo; еще не пройден</div>-->
        <!--    <?php endif; ?>-->
        <!--</td>-->

        <!--<td>-->
        <!--    <div class="font-size-h5"><?php echo e($student->finishedDepthTests ? 'Пройден' : 'Не пройден'); ?></div>-->
        <!--</td>-->

        <!--<td>-->
        <!--    <div class="font-size-h5"><?php echo e($student->hasDepthTests() ? 'Приглашен' : 'Не приглашен'); ?></div>-->
        <!--</td>-->

        <!--<td>-->
        <!--    <div class="font-size-h5"><?php echo e($student->observers && count($student->observers)>0 ? 'Да' : 'Нет'); ?></div>-->
        <!--</td>-->

        <!--<td class="text-nowrap">-->
        <!--    <?php $__empty_1 = true; $__currentLoopData = $student->consultations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $consultation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>-->
        <!--        <div class="font-size-h5"><?php echo e($consultation->FormattedStartAt); ?> - <span class="font-weight-bold <?php echo e($consultation->state->color()); ?>"><?php echo e(mb_strtolower($consultation->state->title())); ?></span></div>-->
        <!--    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>-->
        <!--        <div class="font-size-h5">Записи на консультацию отсутствуют</div>-->
        <!--    <?php endif; ?>-->
        <!--</td>-->

        <!--<td>-->
        <!--    <div class="font-size-h5 text-nowrap">Наставник - <b><?php echo e(optional($student->feedback)->mark ?? 'не указано'); ?></b></div>-->
        <!--    <?php $__currentLoopData = $student->observers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $observer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>-->
        <!--        <div class="font-size-h5 text-nowrap">Родитель (<?php echo e($observer->user->fullName); ?>) - <b><?php echo e(optional($observer->user->feedback)->mark ?? 'не указано'); ?></b></div>-->
        <!--    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>-->
        <!--</td>-->
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</tbody>
<?php /**PATH /home/c41010/mentor.na4u.ru/www/resources/views/school/classes/_show_table/_table-body.blade.php ENDPATH**/ ?>