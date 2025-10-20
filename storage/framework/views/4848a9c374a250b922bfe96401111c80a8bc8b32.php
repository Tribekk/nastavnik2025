<div class="p-10 my-5 border rounded" style="z-index: 2000" x-show="selectRole" @click.away="selectRole = false" wire:ignore>
    <select id="role_id" style="width: 100%;"></select>
    <div class="mt-5">
        <button class="btn btn-success" @click="selectRole = false" wire:click="addRole">Добавить</button>
        <button class="btn btn-secondary ml-3" @click="selectRole = false">Отмена</button>
    </div>
</div>

<div class="d-flex justify-content-between">
    <div>
        <h4 class="mt-5 mb-3 font-weight-bold">Назначенные роли</h4>
    </div>
    <div x-show="!selectRole">
        <button class="btn btn-light-success p-3" @click="selectRole = true">
            <i class="la la-plus"></i> <?php echo e(__('Добавить')); ?>

        </button>
    </div>
</div>

<div class="mt-5">
    <?php $__empty_1 = true; $__currentLoopData = $userRoles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <button wire:click="$emit('remove-role', <?php echo e($role['id']); ?>)"  class="btn btn-outline-primary mr-3 mb-3">
            <i class="la la-times"></i><?php echo e($role['title']); ?>

        </button>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div class="mt-5">
             <?php if (isset($component)) { $__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Alert::class, ['type' => 'outline-info','text' => ''.e(__('Пока не назначено ни одной роли')).'','close' => false]); ?>
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
<?php /**PATH D:\openserver\OpenServer\domains\prof\www\resources\views/admin/users/_edit/_user_roles.blade.php ENDPATH**/ ?>