<div class="d-flex justify-content-between">
    <div>
        <h4 class="mt-5 mb-3 font-weight-bold">Разрешения, выданные напрямую</h4>
    </div>
    <div x-show="!selectPermission">
        <button class="btn btn-light-success p-3" @click="selectPermission = true">
            <i class="la la-plus"></i> <?php echo e(__('Добавить')); ?>

        </button>
    </div>
</div>

<div class="p-10 my-5 border rounded" style="z-index: 2000" x-show="selectPermission" @click.away="selectPermission = false" wire:ignore>
    <select id="permission_id" style="width: 100%;"></select>
    <div class="mt-5">
        <button class="btn btn-success" @click="selectPermission = false" wire:click="addPermission">Добавить</button>
        <button class="btn btn-secondary ml-3" @click="selectPermission = false">Отмена</button>
    </div>
</div>

<div class="mt-5">
    <?php $__empty_1 = true; $__currentLoopData = $userPermissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <button wire:click="$emit('revoke-permission', <?php echo e($permission['id']); ?>)" class="btn btn-outline-primary mr-3 mb-3">
            <i class="la la-times"></i><?php echo e($permission['title']); ?>

        </button>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div class="mt-5">
             <?php if (isset($component)) { $__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Alert::class, ['text' => ''.e(__('Пока не выдано ни одного разрешения')).'','type' => 'outline-info','close' => false]); ?>
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
<?php /**PATH D:\openserver\OpenServer\domains\prof\www\resources\views/admin/users/_edit/_user-permissions.blade.php ENDPATH**/ ?>