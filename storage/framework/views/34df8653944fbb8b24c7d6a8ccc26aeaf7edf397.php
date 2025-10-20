<div class="pb-5" data-wizard-type="step-content" <?php if($step == "second"): ?> data-wizard-state="current" <?php endif; ?>>
    <p class="font-size-h5 text-dark-50 mb-5">
        На выбранное вами время найдено <?php echo e(count($consultants)); ?> консультант<?php echo e(num2word(count($consultants), ["", "а", "ов"])); ?>

    </p>

    <div class="row justify-content-center mt-7">
        <?php $__currentLoopData = $consultants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $consultant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="my-3 col-12 <?php if(!($consultant->id == $consultant_id)): ?> cursor-pointer hover-opacity-80 <?php endif; ?>" wire:click.prevent="setConsultant(<?php echo e($consultant->id); ?>)">
                <?php echo $__env->make('consultant.business-card._business-card.card', ['user' => $consultant, 'selected' => $consultant->id == $consultant_id], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php /**PATH D:\openserver\OpenServer\domains\prof\www\resources\views/consultations/_record-form/second-step.blade.php ENDPATH**/ ?>