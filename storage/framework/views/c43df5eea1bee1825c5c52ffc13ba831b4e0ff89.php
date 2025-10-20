<tbody class="datatable-body">

<?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php

        //dd($student->hasDepthTests());
        $TypeOfThinkingResult = $QuizController->takeUserResults($student);

        //dd($TypeOfThinkingResult);
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
            <?php if($student->getTypeThinkingQuizFinishedAttribute(8)): ?>
                <div class="text-primary">Да</div>
            <?php else: ?>
                <div class="text-success">Нет</div>
            <?php endif; ?>
        </td>

        <td>
            <?php if($student->getTypeThinkingQuizFinishedAttribute(13)): ?>
                <div class="text-primary">Да</div>
            <?php else: ?>
                <div class="text-success">Нет</div>
            <?php endif; ?>
        </td>

        <td>
            <?php if($student->getTypeThinkingQuizFinishedAttribute(3)): ?>
                <div class="text-primary">Да</div>
            <?php else: ?>
                <div class="text-success">Нет</div>
            <?php endif; ?>
        </td>

        <td class="min-w-450px">
            <div class="row">
                <div class="col-md-12 order-1 order-md-0">
                    <div class="progress bg-transparent my-0" style="position: relative; width: 100%; height: 18px;line-height: 18px">
                        <div class="progress-bar rounded-pill" role="progressbar"
                             style="width: <?php echo e($TypeOfThinkingResult['PersonalThinkingTypesAverage']); ?>%;background-color: #FFFFFF;text-align: right"></div>
                        <div style="font-size: 18px;color:<?php echo e($TypeOfThinkingResult['PersonalThinkingTypesAverageColor']); ?>;font-weight: bold"><?php echo e($TypeOfThinkingResult['PersonalThinkingTypesAverage']); ?></div>
                    </div>

                    <div class="progress bg-transparent my-1" style="position: relative; width: 100%; height: 10px">
                        <div class="progress-bar rounded-pill" role="progressbar" style="width: 34%;background-color: #FF0000;border-radius: 0 !important;"></div>
                        <div class="progress-bar rounded-pill" role="progressbar" style="width: 36%;background-color: #FFD966;border-radius: 0 !important;"></div>
                        <div class="progress-bar rounded-pill" role="progressbar" style="width: 30%;background-color: #548235;border-radius: 0 !important;"></div>
                    </div>
                </div>
            </div>
            <?php $__currentLoopData = $TypeOfThinkingResult['PersonalThinkingTypes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="row">
                    <div class="col-md-3 order-1 order-md-0">
                        <div class="progress bg-transparent my-1" style="position: relative; width: 100%; height: 12px">
                            <div class="progress-bar rounded-pill" role="progressbar" style="width: <?php echo e($value->percentage); ?>%;background-color: <?php echo e($value->hexColor()); ?>"></div>
                            <div class="progress-bar bg-dark progress__bg-line" role="progressbar" style="width: <?php echo e(100 - $value->percentage); ?>%;height: 3px;align-self: center;"></div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <?php echo e($value->type->title); ?>

                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </td>

        <td class="min-w-450px">
            <div class="row">
                <div class="col-md-12 order-1 order-md-0">
                    <div class="progress bg-transparent my-0" style="position: relative; width: 100%; height: 18px;line-height: 18px">
                        <div class="progress-bar rounded-pill" role="progressbar"
                             style="width: <?php echo e($TypeOfThinkingResult['ProfessionalThinkingTypesAverage']); ?>%;background-color: #FFFFFF;text-align: right"></div>
                        <div style="font-size: 18px;color:<?php echo e($TypeOfThinkingResult['ProfessionalThinkingTypesAverageColor']); ?>;font-weight: bold"><?php echo e($TypeOfThinkingResult['ProfessionalThinkingTypesAverage']); ?></div>
                    </div>

                    <div class="progress bg-transparent my-1" style="position: relative; width: 100%; height: 10px">
                        <div class="progress-bar rounded-pill" role="progressbar" style="width: 34%;background-color: #FF0000;border-radius: 0 !important;"></div>
                        <div class="progress-bar rounded-pill" role="progressbar" style="width: 36%;background-color: #FFD966;border-radius: 0 !important;"></div>
                        <div class="progress-bar rounded-pill" role="progressbar" style="width: 30%;background-color: #548235;border-radius: 0 !important;"></div>
                    </div>
                </div>
            </div>
            <?php $__currentLoopData = $TypeOfThinkingResult['ProfessionalThinkingTypes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="row">
                    <div class="col-md-3 order-1 order-md-0">
                        <div class="progress bg-transparent my-1" style="position: relative; width: 100%; height: 10px">
                            <div class="progress-bar rounded-pill" role="progressbar" style="width: <?php echo e($value->percentage); ?>%;background-color: <?php echo e($value->hexColor()); ?>"></div>
                            <div class="progress-bar bg-dark progress__bg-line" role="progressbar" style="width: <?php echo e(100 - $value->percentage); ?>%;height: 3px;align-self: center;"></div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <?php echo e($value->type->title); ?>

                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </td>

        <td class="min-w-450px">
            <div class="row">
                <div class="col-md-12 order-1 order-md-0">
                    <div class="progress bg-transparent my-0" style="position: relative; width: 100%; height: 18px;line-height: 18px">
                        <div class="progress-bar rounded-pill" role="progressbar"
                             style="width: <?php echo e($TypeOfThinkingResult['typeThinkingValuesEndAverage']); ?>%;background-color: #FFFFFF;text-align: right"></div>
                        <div style="font-size: 18px;color:<?php echo e($TypeOfThinkingResult['typeThinkingValuesEndAverageColor']); ?>;font-weight: bold"><?php echo e($TypeOfThinkingResult['typeThinkingValuesEndAverage']); ?></div>
                    </div>

                    <div class="progress bg-transparent my-1" style="position: relative; width: 100%; height: 10px">
                        <div class="progress-bar rounded-pill" role="progressbar" style="width: 34%;background-color: #FF0000;border-radius: 0 !important;"></div>
                        <div class="progress-bar rounded-pill" role="progressbar" style="width: 36%;background-color: #FFD966;border-radius: 0 !important;"></div>
                        <div class="progress-bar rounded-pill" role="progressbar" style="width: 30%;background-color: #548235;border-radius: 0 !important;"></div>
                    </div>
                    <div><?php echo e($TypeOfThinkingResult['typeThinkingValuesEndAverageDesc']); ?></div>
                </div>
            </div>

        </td>

        <td class="text-nowrap">
            <?php if($student->studentQuestionnaireResult && $student->studentQuestionnaireResult->willingness_to_choose_profession_score): ?>
                Анкета пройдена <a target="_blank" href="<?php echo e(route('quiz.user_results', $student->id)."#anketa"); ?>" data-toggle="tooltip" title="Просмотр анкеты" class="btn btn-success btn-icon btn-sm ml-3"><i class="la la-eye"></i></a>
                <br>

                <div class="order-1 order-md-0">
                    <div style="width: 100%; text-align: center; color: #2D38FC"><?php echo e($student->studentQuestionnaireResult->willingness_to_choose_profession_score); ?></div>

                    <div class="progress bg-transparent my-1" style="position: relative; width: 100%; height: 10px">
                        <div class="progress-bar rounded-pill" role="progressbar" style="width: <?php echo e($student->studentQuestionnaireResult->willingness_to_choose_profession_score); ?>%;background-color: #2D38FC"></div>
                        <div class="progress-bar bg-dark progress__bg-line" role="progressbar" style="width: <?php echo e(100 - $student->studentQuestionnaireResult->willingness_to_choose_profession_score); ?>%;height: 3px;align-self: center;"></div>
                    </div>
                </div>

            <?php else: ?>
                Анкета не пройдена
            <?php endif; ?>





        </td>

<!--        <td class="min-w-200px">-->
<!--            <div class="">-->
<!---->
<!--            </div>-->
<!--        </td>-->

<!--        <td class="min-w-200px">-->
<!---->
<!---->
<!---->
<!---->
<!---->
<!---->
<!--        </td>-->

<!--        <td class="text-nowrap">-->
<!---->
<!---->
<!---->
<!---->
<!---->
<!---->
<!---->
<!--        </td>-->

<!--        <td>-->
<!--            <div class="text-nowrap">-->
<!---->
<!---->
<!---->
<!--            </div>-->
<!--        </td>-->

<!--        <td class="text-nowrap">-->
<!--            <?php $__empty_1 = true; $__currentLoopData = $student->personTypes(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>-->
<!--                <a href="#" class="font-weight-bold link" data-toggle="modal" data-target="#personType_<?php echo e($student->id); ?>_<?php echo e($type->id); ?>">-->
<!--                    <?php echo e($type->type->title); ?> <span class="font-weight-normal">(<?php echo e($type->value); ?>)</span>-->
<!--                </a>-->
<!--                <br>-->
                <!-- Modal-->
<!--                <div class="modal fade" id="personType_<?php echo e($student->id); ?>_<?php echo e($type->id); ?>" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">-->
<!--                    <div class="modal-dialog modal-dialog-centered" role="document">-->
<!--                        <div class="modal-content">-->
<!--                            <div class="modal-header">-->
<!--                                <h5 class="modal-title font-size-h3 font-weight-bold" id="personType_<?php echo e($student->id); ?>_<?php echo e($type->id); ?>"><?php echo e($type->type->title); ?></h5>-->
<!--                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
<!--                                    <i aria-hidden="true" class="ki ki-close"></i>-->
<!--                                </button>-->
<!--                            </div>-->
<!--                           <div class="modal-body">-->
<!--                               <h4 class="font-size-h5 font-weight-bold mb-3">Рекомендуемые профессии:</h4>-->
<!--                               <div class="font-size-h5">-->
<!--                                   <?php $__currentLoopData = $type->type->professions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $profession): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>-->
<!--                                       <div class="my-2 font-weight-normal text-nowrap"><?php echo $profession->title; ?></div>-->
<!--                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>-->
<!--                               </div>-->

<!--                               <div class="font-size-h5 font-weight-bold mt-3">Набрано: <span class="font-blue"><?php echo e($type->value); ?> <?php echo e(num2word($type->value, ['балл', 'балла', 'баллов'])); ?></span></div>-->
<!--                           </div>-->
<!--                            <div class="modal-footer">-->
<!--                                <button type="button" class="btn btn-success" data-dismiss="modal">Закрыть</button>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>-->
<!--                <div class="">Типаж не выражен</div>-->
<!--            <?php endif; ?>-->
<!--        </td>-->

<!--        <td class="text-nowrap">-->
<!---->
<!--        </td>-->

<!--        <td class="fit">-->
<!--            <?php if($student->hasDepthTests()): ?>-->
<!--                <?php if($student->getFinishedDepthTestsAttribute()): ?>-->
<!--                    <span class="">Пройден</span>-->
<!--                <?php else: ?>-->
<!--                    <span class="">Не пройден</span>-->
<!--                <?php endif; ?>-->
<!--            <?php else: ?>-->
<!--                <?php if($QuizController->is_FinishTypeOfThinking($student)): ?>-->
<!--                <form action="<?php echo e(route('employer.students.invite.depth_test', $student)); ?>" method="post">-->
<!--                    <?php echo csrf_field(); ?>-->
<!--                     <?php if (isset($component)) { $__componentOriginal0d75fdd1ee12f34e798ece0533de749fd4d3d96a = $component; } ?>
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
<?php endif; ?> -->
<!--                </form>-->
<!--                <?php else: ?>-->
<!--                    <span>Базовый тур не пройден</span>-->
<!--                <?php endif; ?>-->
<!--            <?php endif; ?>-->
<!--        </td>-->
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</tbody>
<?php /**PATH /home/c41010/mentor.na4u.ru/www/resources/views/employer/students/list/_list/_table-body.blade.php ENDPATH**/ ?>