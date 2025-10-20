<?php $__env->startSection('subheader'); ?>
     <?php if (isset($component)) { $__componentOriginal94da708f5fed2e003e635f558c4309c9810b422b = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Subheader::class, ['title' => 'Мои структурные подразделения']); ?>
<?php $component->withName('subheader'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal94da708f5fed2e003e635f558c4309c9810b422b)): ?>
<?php $component = $__componentOriginal94da708f5fed2e003e635f558c4309c9810b422b; ?>
<?php unset($__componentOriginal94da708f5fed2e003e635f558c4309c9810b422b); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="d-flex flex-column-fluid">
        <div class="container">

            <?php $__empty_1 = true; $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="card card-custom gutter-b">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <div class="d-flex align-items-center justify-content-between flex-wrap mt-2">
                                    <a href="<?php echo e(route('school.classes.show.table', ['class' => $class->id])); ?>" class="d-flex link align-items-center text-primary text-hover-danger text-hover-primary font-size-h2 font-weight-bold mr-3">
                                        <?php echo e($class->school->short_title ?? '-'); ?>. Структурное подразделение <?php echo e($class->number); ?><?php echo e($class->letter); ?> (год: <?php echo e($class->year ? $class->year : 'не указан'); ?>, кол-во: <?php echo e($class->students_count ?? 'не указано'); ?>)
                                    </a>
                                </div>
                                <div class="separator separator-solid my-7"></div>
                                <div class="mt-2 row">
                                    <div class="col-md-4 my-3">
                                        <div class="font-size-h4 font-weight-bold">Руководители</div>
                                        <span class="font-size-h5">
                                            <?php if(!Auth::user()->hasRole('curator') && !Auth::user()->isAdmin): ?>
                                                <?php echo e(Auth::user()->fullName); ?>

                                            <?php else: ?>
                                                <?php $__empty_2 = true; $__currentLoopData = $class->curators; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $curator): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                                                    <?php echo e($curator->user->fullName); ?><?php echo e(!$loop->last ? ', ' : '.'); ?>

                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                                                    не указан
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </span>
                                    </div>

                                    <div class="col-md-4 my-3">
                                        <div class="font-size-h4 font-weight-bold">Зарегистрировано</div>
                                        <span class="font-size-h5"><?php echo e($class->students()->count()); ?> <?php echo e(num2word($class->students()->count(), ['человек', 'человека', 'человек'])); ?></span>
                                    </div>

                                    <div class="col-md-4 my-3">
                                        <div class="font-size-h4 font-weight-bold">Статус проекта</div>

                                        <?php
                                            $status = $wrapper->takeStatusQuizzesClass($class->students);
                                        ?>

                                        <span class="font-size-h5 <?php echo e($status['class_color']); ?>"><?php echo e($status['status_label']); ?></span>
                                    </div>

                                    <div class="col-md-4 my-3">
                                        <div class="font-size-h4 font-weight-bold">Отметка заполнения анкеты</div>

                                        <?php
                                            $mark = $wrapper->markQuestionnaireStudents($class->students);
                                        ?>

                                        <span class="font-size-h5 <?php echo e($mark['class_color']); ?>"><?php echo e($mark['label']); ?></span>
                                    </div>

                                    <div class="col-md-4 my-3">
                                        <div class="font-size-h4 font-weight-bold">Отметка прохождения базового теста</div>

                                        <?php
                                            $mark = $wrapper->markBaseTestStudents($class->students);
                                        ?>

                                        <span class="font-size-h5 <?php echo e($mark['class_color']); ?>"><?php echo e($mark['label']); ?></span>
                                    </div>

                                    <div class="col-md-4 my-3">
                                        <div class="font-size-h4 font-weight-bold">Приглашены на глубинный тест</div>
                                        <?php
                                            $data = $wrapper->studentsInvitedDepthTests($class->students);
                                        ?>
                                        <div class="font-size-h5"><?php echo e($data['label']); ?> (<?php echo e($data['percentage']); ?>%)</div>
                                    </div>

                                    <div class="col-md-4 my-3">
                                        <div class="font-size-h4 font-weight-bold">Получили консультацию</div>

                                        <?php
                                            $data = $wrapper->studentsFinishedConsultation($class->students);
                                        ?>

                                        <div class="font-size-h5"><?php echo e($data['label']); ?> (<?php echo e($data['percentage']); ?>%)</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                 <?php if (isset($component)) { $__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Alert::class, ['type' => 'info','text' => 'На данный момент нет структурных подразделений','close' => false]); ?>
<?php $component->withName('alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php if (isset($__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975)): ?>
<?php $component = $__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975; ?>
<?php unset($__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
            <?php endif; ?>

            <?php echo e($classes->links()); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/c41010/mentor.na4u.ru/www/resources/views/school/classes/list.blade.php ENDPATH**/ ?>