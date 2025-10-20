<?php $__env->startSection('subheader'); ?>
     <?php if (isset($component)) { $__componentOriginal94da708f5fed2e003e635f558c4309c9810b422b = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Subheader::class, ['title' => 'Профтрекер']); ?>
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
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="mt-3 d-flex flex-wrap">
                    <div class="flex-grow-1">
                        <h1 class="font-size-h2 font-alla font-hero">Анкета студента</h1>
                        <h3 class="font-size-h3"><?php echo e($user->fullName); ?></h3>
                    </div>
                    <?php if(request('backTo', false)): ?>
                        <div class="w-sm-200px w-100 text-sm-right mt-4 mt-sm-0 mb-4 mb-sm-0">
                            <a href="<?php echo e(request('backTo')); ?>" class="ml-2 btn btn-outline-success"><i class="la la-reply"></i>Вернуться назад</a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="card-body">
                <?php echo $__env->make('quiz.questionnaire.questions', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/c41010/mentor.na4u.ru/www/resources/views/quiz/questionnaire/_student-questionnaire.blade.php ENDPATH**/ ?>