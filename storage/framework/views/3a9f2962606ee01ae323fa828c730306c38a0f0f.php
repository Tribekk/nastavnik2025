<tbody class="datatable-body">
<?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php
        //dd($student->hasDepthTests());
    ?>
    <tr class="font-size-lg">
        <td class="fit">
            <?php echo e($students->firstItem() + $index); ?>

        </td>

        <td class="w-min-225px">
            <?php echo e($student->fullName); ?>

        </td>

        <td>
            <?php echo e($student->birthDateFormatted); ?> <?php if($student->fullYears > 0): ?> (<?php echo e($student->fullYearsFormatted); ?>) <?php endif; ?>
        </td>

        <td class="fit">
            <?php if($student->school): ?>
                <a href="<?php echo e(route('admin.reports.students', ['school_id' => $student->school_id])); ?>" class="link">
                    <?php echo e($student->school->short_title); ?>

                </a>
            <?php else: ?>
                не указана
            <?php endif; ?>
        </td>

        <td class="fit">
            <?php if($student->school && $student->class): ?>
                <a href="<?php echo e(route('admin.reports.students', ['school_id' => $student->school_id, 'class_id' => $student->class_id])); ?>" class="link">
                    <?php echo e($student->class->number); ?><?php echo e($student->class->letter); ?>

                </a>
            <?php else: ?>
                не указан
            <?php endif; ?>
        </td>

        <td>
            <?php $__empty_1 = true; $__currentLoopData = $student->studentQuestionnaireResult->favoriteSubjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class=""><?php echo e($subject); ?><?php echo e($loop->last ? '.' : ';'); ?></div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="">-</div>
            <?php endif; ?>
        </td>

        <td>
            <?php echo e($student->studentQuestionnaireResult->avgMark); ?>

        </td>

        <td class="min-w-250px">
            <?php $__empty_1 = true; $__currentLoopData = $student->studentQuestionnaireResult->perfectFuture; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class=""><?php echo e($value); ?><?php echo e($loop->last ? '.' : ';'); ?></div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="">-</div>
            <?php endif; ?>
        </td>

        <td>
            <?php echo e($student->studentQuestionnaireResult->chancesOfStayingHometown['value'] ?? '-'); ?>

        </td>

        <td class="min-w-125px">
            <?php $__empty_1 = true; $__currentLoopData = $student->studentQuestionnaireResult->limitingHealthFeatures; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class=""><?php echo e($value); ?><?php echo e($loop->last ? '.' : ';'); ?></div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="">Ограничений нет</div>
            <?php endif; ?>
        </td>

        <td class="text-nowrap">
            <?php $__empty_1 = true; $__currentLoopData = $student->studentQuestionnaireResult->personalQualities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class=""><?php echo e($value); ?><?php echo e($loop->last ? '.' : ';'); ?></div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="">-</div>
            <?php endif; ?>
        </td>

        <td class="text-nowrap">
            <?php $__empty_1 = true; $__currentLoopData = $student->studentQuestionnaireResult->motiveOfChoice; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class=""><?php echo e($value); ?><?php echo e($loop->last ? '.' : ';'); ?></div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="">-</div>
            <?php endif; ?>
        </td>

        <td class="min-w-200px">
            <div class="">
                <?php echo e($student->studentQuestionnaireResult->concludingContractTargetedTraining); ?>

            </div>
        </td>

        <td class="min-w-200px">
            <div class="">
                <?php echo e($student->studentQuestionnaireResult->willingness_to_choose_profession_label); ?>

                <span class="<?php echo e($student->studentQuestionnaireResult->willingness_to_choose_profession_score >= 6 ? 'text-success' : 'font-alla'); ?>">
                    (<?php echo e($student->studentQuestionnaireResult->willingness_to_choose_profession_score); ?> баллов)
                </span>
            </div>
        </td>

        <td class="text-nowrap">
            <?php $__empty_1 = true; $__currentLoopData = $student->professionalTypeResult->values()->where('value', '!=', 0)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="">
                    <?php echo e($value->type->title); ?> <span class="font-weight-normal">(<?php echo e($value->value); ?>)</span>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="">Не выражено</div>
            <?php endif; ?>
        </td>

        <td>
            <div class="text-nowrap">
                <?php $__currentLoopData = $student->characterTraitResult->values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="<?php echo e($value->is_higher ? 'text-warning' : 'font-alla'); ?>"><b><?php echo e($value->title); ?></b> - <?php echo e($value->percentage); ?>%</div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </td>

        <td class="text-nowrap">
            <?php $__empty_1 = true; $__currentLoopData = $student->personTypes(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <a href="#" class="font-weight-bold link" data-toggle="modal" data-target="#personType_<?php echo e($student->id); ?>_<?php echo e($type->id); ?>">
                    <?php echo e($type->type->title); ?> <span class="font-weight-normal">(<?php echo e($type->value); ?>)</span>
                </a>
                <br>
                <!-- Modal-->
                <div class="modal fade" id="personType_<?php echo e($student->id); ?>_<?php echo e($type->id); ?>" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title font-size-h3 font-weight-bold" id="personType_<?php echo e($student->id); ?>_<?php echo e($type->id); ?>"><?php echo e($type->type->title); ?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <i aria-hidden="true" class="ki ki-close"></i>
                                </button>
                            </div>
                           <div class="modal-body">
                               <h4 class="font-size-h5 font-weight-bold mb-3">Рекомендуемые профессии:</h4>
                               <div class="font-size-h5">
                                   <?php $__currentLoopData = $type->type->professions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $profession): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                       <div class="my-2 font-weight-normal text-nowrap"><?php echo $profession->title; ?></div>
                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                               </div>

                               <div class="font-size-h5 font-weight-bold mt-3">Набрано: <span class="font-blue"><?php echo e($type->value); ?> <?php echo e(num2word($type->value, ['балл', 'балла', 'баллов'])); ?></span></div>
                           </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success" data-dismiss="modal">Закрыть</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="">Типаж не выражен</div>
            <?php endif; ?>
        </td>

        <td class="text-nowrap">
            "<?php echo e($student->suitableProfessions->careerMatrix->activityObject->title); ?>" + "<?php echo e($student->suitableProfessions->careerMatrix->activityKind->title); ?>"
        </td>

        <td class="fit">
            <?php if($student->hasDepthTests()): ?>
                <?php if($student->getFinishedDepthTestsAttribute()): ?>
                    <span class="">Пройден</span>
                <?php else: ?>
                    <span class="">Не пройден</span>
                <?php endif; ?>
            <?php else: ?>
                <form action="<?php echo e(route('employer.students.invite.depth_test', $student)); ?>" method="post">
                    <?php echo csrf_field(); ?>
                     <?php if (isset($component)) { $__componentOriginal0d75fdd1ee12f34e798ece0533de749fd4d3d96a = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\Submit::class, ['title' => 'Пригласить']); ?>
<?php $component->withName('inputs.submit'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal0d75fdd1ee12f34e798ece0533de749fd4d3d96a)): ?>
<?php $component = $__componentOriginal0d75fdd1ee12f34e798ece0533de749fd4d3d96a; ?>
<?php unset($__componentOriginal0d75fdd1ee12f34e798ece0533de749fd4d3d96a); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
                </form>
            <?php endif; ?>
        </td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</tbody>
<?php /**PATH D:\openserver\OpenServer\domains\prof\www\resources\views/employer/students/list/_list/_table-body.blade.php ENDPATH**/ ?>