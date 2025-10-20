<div>
     <?php if (isset($component)) { $__componentOriginal5537beb2e27514b217ef87ccd55efec39410ded0 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Tables\Filters::class, ['withoutActions' => true]); ?>
<?php $component->withName('tables.filters'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
        <?php echo $__env->make('admin.authorization.roles._index._search', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
     <?php if (isset($__componentOriginal5537beb2e27514b217ef87ccd55efec39410ded0)): ?>
<?php $component = $__componentOriginal5537beb2e27514b217ef87ccd55efec39410ded0; ?>
<?php unset($__componentOriginal5537beb2e27514b217ef87ccd55efec39410ded0); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 

     <?php if (isset($component)) { $__componentOriginal5f1c24da064cdf37917762bf37a30d0804319ee8 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Card::class, []); ?>
<?php $component->withName('card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
         <?php $__env->slot('title'); ?> <?php echo e(__('Роли')); ?> <?php $__env->endSlot(); ?>
         <?php $__env->slot('toolbar'); ?> 
             <?php if (isset($component)) { $__componentOriginal08b461424c1656985c58a1aeedb49491fde44a5f = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\ButtonLink::class, ['link' => ''.e(route('admin.roles.create')).'','title' => ''.e(__('Новая роль')).'','icon' => 'la-plus']); ?>
<?php $component->withName('inputs.button-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal08b461424c1656985c58a1aeedb49491fde44a5f)): ?>
<?php $component = $__componentOriginal08b461424c1656985c58a1aeedb49491fde44a5f; ?>
<?php unset($__componentOriginal08b461424c1656985c58a1aeedb49491fde44a5f); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
         <?php $__env->endSlot(); ?>

        <?php if($roles->count() > 0): ?>
            <?php echo $__env->make('admin.authorization.roles._index._table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php else: ?>
             <?php if (isset($component)) { $__componentOriginal48fbbe9627cbd0bd4f43258bfa025aff722815bb = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Tables\EmptyAlert::class, ['text' => ''.e(__('По вашему запросу не найдено ни одной роли.')).'']); ?>
<?php $component->withName('tables.empty-alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?> <?php if (isset($__componentOriginal48fbbe9627cbd0bd4f43258bfa025aff722815bb)): ?>
<?php $component = $__componentOriginal48fbbe9627cbd0bd4f43258bfa025aff722815bb; ?>
<?php unset($__componentOriginal48fbbe9627cbd0bd4f43258bfa025aff722815bb); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
        <?php endif; ?>
     <?php if (isset($__componentOriginal5f1c24da064cdf37917762bf37a30d0804319ee8)): ?>
<?php $component = $__componentOriginal5f1c24da064cdf37917762bf37a30d0804319ee8; ?>
<?php unset($__componentOriginal5f1c24da064cdf37917762bf37a30d0804319ee8); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
</div>

<?php $__env->startPush('scripts'); ?>
    <script type="text/javascript">

        document.addEventListener('DOMContentLoaded', function () {
        window.livewire.find('<?php echo e($_instance->id); ?>').on('delete-role', $id => {
            Swal.fire({
                title: 'Вы действительно хотите удалить роль?',
                showCancelButton: true,
                confirmButtonColor: 'var(--success)',
                cancelButtonColor: 'var(--primary)',
                confirmButtonText: 'Удалить',
                cancelButtonText: 'Отмена'
            }).then((result) => {
                if (result.value) {
                window.livewire.find('<?php echo e($_instance->id); ?>').call('delete', $id);
                }
            });
        });
        })
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/c41010/mentor.na4u.ru/www/resources/views/livewire/authorization/roles/index.blade.php ENDPATH**/ ?>