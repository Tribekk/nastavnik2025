<div class="wizard wizard-1"
     <?php if($step == "first" || $step == "last"): ?>
        data-wizard-state="<?php echo e($step == 'first' ? 'first' : 'last'); ?>"
     <?php else: ?>
        data-wizard-state="between"
     <?php endif; ?>
     data-wizard-clickable="false">

    <?php echo $__env->make('consultations._record-form.head-stepper', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="row justify-content-center my-10 my-lg-15">
        <div class="col-xl-12 col-xxl-7">
            <form class="form"
                  action="#"
                  method="post">
                <?php echo csrf_field(); ?>

                <?php if($errors->any()): ?>
                    <div class="mb-12">
                         <?php if (isset($component)) { $__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Alert::class, ['type' => 'danger','text' => ''.e($errors->first()).'','close' => false]); ?>
<?php $component->withName('alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975)): ?>
<?php $component = $__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975; ?>
<?php unset($__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
                    </div>
                <?php endif; ?>

                <?php echo $__env->make('consultations._record-form.first-step', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('consultations._record-form.second-step', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('consultations._record-form.last-step', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <div class="button-group border-top mt-5 pt-10">
                    <button type="button" class="btn btn-outline-primary" wire:click="changeStep(false)" data-wizard-type="action-prev">Назад</button>
                    <button type="button" class="btn btn-primary" data-wizard-type="action-submit" wire:click="storeRecord">Подтвердить</button>
                    <button type="button" class="btn <?php if($this->canGoNextStep()): ?> btn-primary <?php else: ?> btn-secondary <?php endif; ?>" <?php if(!$this->canGoNextStep()): ?> style="pointer-events: none;" <?php endif; ?> wire:click="changeStep(true)" data-wizard-type="action-next">Продолжить</button>
                </div>
             </form>
        </div>
    </div>
</div>

<?php $__env->startPush('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/pages/wizard/wizard-1.css')); ?>">
<?php $__env->stopPush(); ?>
<?php /**PATH D:\openserver\OpenServer\domains\prof\www\resources\views/livewire/consultations/record-form.blade.php ENDPATH**/ ?>