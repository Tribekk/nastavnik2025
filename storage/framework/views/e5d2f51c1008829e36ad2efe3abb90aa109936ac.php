<?php $__env->startSection('subheader'); ?>
     <?php if (isset($component)) { $__componentOriginal94da708f5fed2e003e635f558c4309c9810b422b = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Subheader::class, ['title' => 'Описание']); ?>
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

    <div class="container h-50">
        <div class="row h-100">
            <div class="col-xl-12">
                <div class="card card-custom gutter-b h-100">

                    <div class="card-body">
                        <h3 class="font-pixel font-orange font-size-h1 mb-10">
                            <?php echo e($availableQuiz->quiz->title); ?>

                        </h3>
                        <div class="row">
                            <div class="col-12 col-md-4">
                                
                                <form method="post" class="align-self-end mb-8 md-md-0" action="<?php echo e(route('quiz.start', $availableQuiz)); ?>">
                                    <?php echo csrf_field(); ?>
                                    <button class="btn <?php echo e($availableQuiz->quiz->id ==3 ? 'btn-green':'btn-info'); ?> px-md-10 text-white py-4 px-5 font-size-h3 font-weight-bolder my-2 rounded-pill col-12"><?php echo e($availableQuiz->quiz->title == "Кейсы" ? 'Решить кейсы' : 'Ответить на вопросы'); ?></button>
                                </form>
                            </div>
                            <div class="col-12 col-md-8 font-size-h2" style="line-height: 3rem;">
                                <?php echo $availableQuiz->quiz->description; ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/c41010/mentor.na4u.ru/www/resources/views/quiz/description.blade.php ENDPATH**/ ?>