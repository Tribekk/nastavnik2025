<div class="p-10 my-5 border rounded" style="z-index: 2000" x-show="selectCurator" @click.away="selectCurator = false" wire:ignore>
    <select id="curator_id" style="width: 100%;"></select>
    <div class="mt-5">
        <button class="btn btn-success" @click="selectCurator = false" wire:click="addCurator">Добавить</button>
        <button class="btn btn-secondary ml-3" @click="selectCurator = false">Отмена</button>
    </div>
</div>

<div class="d-flex justify-content-between">
    <div>
        <h4 class="mt-5 mb-3 font-weight-bold">Назначенные руководители структурного подразделения</h4>
    </div>
    <div x-show="!selectCurator">
        <button class="btn btn-light-success p-3" @click="selectCurator = true">
            <i class="la la-plus"></i> <?php echo e(__('Добавить')); ?>

        </button>
    </div>
</div>

<div class="mt-5">
    <?php
    ?>
    <?php $__empty_1 = true; $__currentLoopData = $curators; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $curator): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <button wire:click="$emit('remove-curator', <?php echo e($curator['id']); ?>)"  class="btn btn-outline-primary mr-3 mb-3">
            <i class="la la-times"></i><?php echo e($curator->user->fullName); ?>

        </button>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div class="mt-5">
             <?php if (isset($component)) { $__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Alert::class, ['type' => 'outline-info','text' => ''.e(__('Пока не назначено ни одного руководителя')).'','close' => false]); ?>
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
</div>
<?php /**PATH /home/c41010/mentor.na4u.ru/www/resources/views/admin/schools/_edit/_class-curators.blade.php ENDPATH**/ ?>