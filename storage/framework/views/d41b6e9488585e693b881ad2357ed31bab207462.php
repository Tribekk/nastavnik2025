<h3 class="font-pixel font-orange font-size-h1 mb-10">
    Результаты: <?php echo e($availableQuiz->quiz->title); ?>

</h3>

<?php if(!isset($disablePreviousLink)): ?>
    <div>
        <a role="button" class="link font-size-h3" href="<?php echo e(route('quiz.view')); ?>">К списку анкет и тестов</a>
    </div>
<?php endif; ?>

<?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <?php $value = $result->values->where('type_id', $type->id)->first() ?>

    <div class="row mt-15 px-1 px-md-15">
        <div class="col-6 col-md-8">
            <div class="progress mt-3">
                <div class="progress-bar bg-<?php echo e($value->color); ?>" role="progressbar" style="width: <?php echo e($value->percentage ?? 0); ?>%" aria-valuenow="<?php echo e($value->percentage ?? 0); ?>" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </div>
        <div class="col-6 col-md-4">
            <div class="font-size-lg">
                <a class="link" href="<?php echo e(route('quiz.type-details', [$availableQuiz, $type, 'backTo' => $backTo ?? false])); ?>">
                    <?php echo e($type->area); ?>

                </a>
            </div>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<div class="row mt-20 px-1 px-md-15">
    <div class="col-6 col-md-9">
        <div class="progress">
            <div class="progress-bar bg-alla" role="progressbar" style="width: <?php echo e($result->reliabilityPercentage); ?>%" aria-valuenow="<?php echo e($result->reliabilityPercentage); ?>" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="font-size-lg">
            Шкала честности
        </div>
    </div>
</div>

<div class="row mt-10 px-1 px-md-15">
    <div class="col">
        <div>
            <span class="font-hero-super font-blue">Полученные результаты достоверны на</span> <span class="font-size-h2 font-hero-super font-alla"><?php echo e($result->reliabilityPercentage == 70 ? 'менее 70' : $result->reliabilityPercentage); ?>%</span>
        </div>
        <div class="font-size-lg mt-2">
            <?php echo e($result->reliabilityDescription); ?>

        </div>
    </div>
</div>
<?php /**PATH D:\openserver\OpenServer\domains\prof\www\resources\views/quiz/_result-interests.blade.php ENDPATH**/ ?>