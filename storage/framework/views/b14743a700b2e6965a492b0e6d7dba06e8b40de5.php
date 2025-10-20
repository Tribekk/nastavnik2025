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
            <div class="card">
                <div class="card-header">
                    <div class="mt-3 d-flex flex-wrap">
                        <div class="flex-grow-1">
                            <h2 class="font-size-h2 font-weight-bold text-break"><?php echo e($class->school->short_title ?? '-'); ?>. Структурное подразделение <?php echo e($class->number); ?><?php echo e($class->letter); ?> (год: <?php echo e($class->year ? $class->year : 'не указан'); ?>)</h2>
                        </div>
                        <div class="w-md-625px w-100 justify-content-md-end d-flex mt-4 mt-md-0 mb-4 mb-md-0">
                            <?php if(Auth::user()->isTeacher || Auth::user()->isCurator): ?>
                                <a href="<?php echo e(route('school.classes.list')); ?>" class="btn btn-success"><i class="la la-reply"></i>К списку структурных подразделений</a>&nbsp;&nbsp;
                                <!--<a href="<?php echo e(route('school.classes.add_student_with_parent',$class->id)); ?>" class="btn btn-success">Добавить наставника</a>-->
                            <?php endif; ?>
                            <a href="<?php echo e(route('school.classes.show', $class)); ?>" class="ml-2 btn btn-outline-success"><i class="la la-address-card"></i>Карточки</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <?php if($students->count() > 0): ?>
                        <?php echo $__env->make('school.classes._show_table._table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php else: ?>
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
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/c41010/mentor.na4u.ru/www/resources/views/school/classes/show_table.blade.php ENDPATH**/ ?>