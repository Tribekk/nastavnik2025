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

            <div class="card card-custom gutter-b">
                <div class="card-body">
                    <div class="mt-3 d-flex flex-wrap">
                        <div class="flex-grow-1">
                            <h2 class="font-size-h2 font-weight-bold text-break"><?php echo e($class->school->short_title ?? '-'); ?>. Структурное подразделение <?php echo e($class->number); ?><?php echo e($class->letter); ?> (год: <?php echo e($class->year ? $class->year : 'не указан'); ?>)</h2>
                        </div>
                        <div class="w-md-325px w-100 justify-content-md-end d-flex mt-4 mt-md-0 mb-4 mb-md-0">
                            <?php if(Auth::user()->isTeacher || Auth::user()->isCurator): ?>
                                <a href="<?php echo e(route('school.classes.list')); ?>" class="btn btn-success"><i class="la la-reply"></i>К списку структурных подразделений</a>
                                <a href="<?php echo e(route('school.classes.add_student_with_parent',['class' => $class->id])); ?>" class="btn btn-success"><i class="la la-reply"></i>Добавить наставника и родителя</a>
                            <?php endif; ?>
                            <a href="<?php echo e(route('school.classes.show.table', $class)); ?>" class="ml-2  btn btn-outline-success"><i class="la la-th-list"></i>Табличный вид</a>
                        </div>
                    </div>
                </div>
            </div>

            <?php $__empty_1 = true; $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="card card-custom gutter-b">
                    <div class="card-body">
                        <div class="d-flex text-break">
                            <div class="flex-grow-1">
                                <div class="d-flex align-items-center justify-content-between flex-wrap">
                                    <div class="mr-3">
                                        <p class="d-flex align-items-center font-blue font-size-h1 font-weight-bold mr-3">
                                            <?php echo e($student->fullName); ?>

                                        </p>

                                        <div class="d-flex flex-wrap my-2">
                                            <?php if($student->phone): ?>
                                                <a href="tel:<?php echo e(unFormatPhone($student->phone)); ?>" class="text-muted text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                                    <i class="la la-phone mr-1"></i>
                                                    <span id="phone"><?php echo e($student->phone); ?></span>
                                                </a>
                                            <?php endif; ?>


                                            <?php if($student->email): ?>
                                                <a href="mailto:<?php echo e($student->email); ?>" class="text-muted text-hover-primary d-flex font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2 text-break">
                                                    <i class="la la-at mr-1"></i>
                                                    <span><?php echo e($student->email); ?></span>
                                                </a>
                                            <?php endif; ?>

                                            <?php if($student->city): ?>
                                                <span class="text-dark-50 font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                                    <i class="la la-location-arrow mr-1"></i>
                                                    <?php echo e($student->city); ?>

                                                </span>
                                            <?php endif; ?>

                                            <?php if($student->birthDateFormatted): ?>
                                                <span class="text-dark-50 font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                                    <i class="las la-birthday-cake mr-1"></i>
                                                    <?php echo e($student->birthDateFormatted); ?>

                                                    <?php if($student->fullYears): ?>
                                                        (<?php echo e($student->fullYearsFormatted); ?>)
                                                    <?php endif; ?>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="d-flex flex-wrap font-size-h6 my-2">
                                            <span class="text-dark-50 font-weight-bold mr-3 mb-lg-0 mb-2">
                                                <?php echo e($student->class->number); ?><?php echo e($student->class->letter); ?> (год: <?php echo e($student->class->year ?  $student->class->year : 'не указан'); ?>),
                                            </span>
                                            <span class="text-dark-50  font-weight-bold mr-3 mb-lg-0 mb-2"><?php echo e($student->school->short_title); ?></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="separator separator-solid my-7"></div>
                                <div class="mt-2 row">
                                    <div class="col-md-4 my-4">
                                        <div class="font-size-h4 font-weight-bold">Количество тестов (базовые + глубинные)</div>
                                        <span class="font-size-h5"><?php echo e($student->availableQuizzes()->whereHas('quiz', function($q) { $q->where('type', 'test'); })->count()); ?></span>
                                    </div>

                                    <div class="col-md-4 my-4">
                                        <div class="font-size-h4 font-weight-bold">Количество пройденных тестов</div>
                                        <span class="font-size-h5 text-success"><?php echo e($student->countFinishedTests); ?></span>
                                    </div>

                                    <div class="col-md-4 my-4">
                                        <div class="font-size-h4 font-weight-bold">Количество непройденных тестов</div>
                                        <span class="font-size-h5 text-primary"><?php echo e(($student->availableQuizzes()->whereHas('quiz', function($q) { $q->where('type', 'test'); })->count() - $student->countFinishedTests)); ?></span>
                                    </div>
                                    <div class="col-md-4 my-4">
                                        <div class="font-size-h4 font-weight-bold">Отметка заполнения анкеты</div>
                                        <?php if($student->studentQuestionnaireFinished): ?>
                                            <span class="font-size-h5 text-success">Да</span>
                                            <?php else: ?>
                                            <span class="font-size-h5 text-primary">Нет</span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-md-4 my-4">
                                        <div class="font-size-h4 font-weight-bold">Отметка прохождения базового теста</div>
                                        <?php echo $wrapper->studentBaseTestStatus($student); ?>

                                    </div>
                                    <div class="col-md-4 my-4">
                                        <div class="font-size-h4 font-weight-bold">Отметка прохождения глубинного теста</div>
                                        <div class="text-dark-50 font-size-h5"><?php echo e($student->finishedDepthTests ? 'Пройден' : 'Не пройден'); ?></div>
                                    </div>
                                    <div class="col-md-4 my-4">
                                        <div class="font-size-h4 font-weight-bold">Отметка получения консультации</div>
                                        <?php $__empty_2 = true; $__currentLoopData = $student->consultations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $consultation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                                            <div class="text-dark-50 font-size-h5"><?php echo e($consultation->FormattedStartAt); ?> - <span class="font-weight-bold <?php echo e($consultation->state->color()); ?>"><?php echo e(mb_strtolower($consultation->state->title())); ?></span></div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                                            <div class="text-dark-50 font-size-h5">Записи на консультацию отсутствуют</div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-md-4 my-4">
                                        <div class="font-size-h4 font-weight-bold">Общая оценка по итогам проекта</div>
                                        <div class="text-dark-50 font-size-h5">Наставник - <b><?php echo e(optional($student->feedback)->mark ?? 'не указано'); ?></b></div>
                                        <?php $__currentLoopData = $student->observers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $observer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="text-dark-50 font-size-h5">Родитель (<?php echo e($observer->user->fullName); ?>) - <b><?php echo e(optional($observer->user->feedback)->mark ?? 'не указано'); ?></b></div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                                <div class="separator separator-solid my-7"></div>
                                <div class="mt-3 mb-5 font-size-h3 font-weight-bold text-primary">Информация о тестах</div>
                                <div class="row">
                                    <?php $__currentLoopData = $student->availableQuizzes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $availableQuiz): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($availableQuiz->quiz->type == "test"): ?>
                                            <div class="col-md-4 my-4">
                                                <div class="font-size-h5 font-weight-bold"><?php echo e($availableQuiz->quiz->title); ?></div>
                                                <div class="font-size-h6 text-dark-50"><?php echo e($availableQuiz->quiz->questionCount); ?> вопросов</div>

                                                <?php switch($availableQuiz->quiz->slug):
                                                    case ('traits'): ?>
                                                        <div class="font-size-h6 text-dark-50"><?php echo e($student->characterTraitQuizFinished ? 'Пройден' : 'Не пройден'); ?></div>
                                                    <?php break; ?>
                                                    <?php case ('interests'): ?>
                                                        <div class="font-size-h6 text-dark-50"><?php echo e($student->interestsQuizFinished ? 'Пройден' : 'Не пройден'); ?></div>
                                                    <?php break; ?>
                                                    <?php case ('suitable-professions'): ?>
                                                        <div class="font-size-h6 text-dark-50"><?php echo e($student->suitableProfessionsQuizFinished ? 'Пройден' : 'Не пройден'); ?></div>
                                                    <?php break; ?>
                                                    <?php case ('inclinations'): ?>
                                                        <div class="font-size-h6 text-dark-50"><?php echo e($student->inclinationQuizFinished ? 'Пройден' : 'Не пройден'); ?></div>
                                                    <?php break; ?>
                                                    <?php case ('intelligence-level'): ?>
                                                        <div class="font-size-h6 text-dark-50"><?php echo e($student->intelligenceLevelQuizFinished ? 'Пройден' : 'Не пройден'); ?></div>
                                                    <?php break; ?>
                                                    <?php case ('type-of-thinking'): ?>
                                                        <div class="font-size-h6 text-dark-50"><?php echo e($student->typeThinkingQuizFinished ? 'Пройден' : 'Не пройден'); ?></div>
                                                    <?php break; ?>
                                                    <?php case ('solution_of_cases'): ?>
                                                        <div class="font-size-h6 text-dark-50"><?php echo e($student->solutionCasesQuizFinished ? 'Пройден' : 'Не пройден'); ?></div>
                                                    <?php break; ?>
                                                <?php endswitch; ?>

                                                <?php if($availableQuiz->state->fillable()): ?>
                                                    <div class="text-dark-50 font-size-h6 mb-3">
                                                        Заполнено на <?php echo e($availableQuiz->quiz->filledPercentage($student)); ?>%
                                                    </div>
                                                <?php else: ?>
                                                    <div class="text-dark-50 font-size-h6">
                                                        <small class="text-muted"><?php echo e($availableQuiz->finished_at->format('d.m.Y')); ?></small>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>















































                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                 <?php if (isset($component)) { $__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Alert::class, ['type' => 'info','text' => 'На данный момент у структурного подразделения нет наставников','close' => false]); ?>
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
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/c41010/mentor.na4u.ru/www/resources/views/school/classes/show.blade.php ENDPATH**/ ?>