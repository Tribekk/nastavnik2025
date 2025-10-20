<div class="d-flex align-items-center bg-light-<?php echo e($type); ?> rounded p-5 gutter-b" wire:self.ignore>
    <span class="svg-icon svg-icon-warning mr-5">
        <span class="svg-icon svg-icon-lg">
            <i class="<?php echo e($icon); ?> icon-2x text-<?php echo e($type); ?>"></i>
        </span>
    </span>
    <div class="d-flex flex-column flex-grow-1 mr-2">
        <a href="<?php echo e($link); ?>" class="font-weight-normal text-dark-75 text-hover-primary font-size-lg mb-1">
            <?php echo e($title); ?>

        </a>
        <span class="text-muted font-size-sm">
            <?php echo e($created); ?>

        </span>
    </div>
    <div class="d-flex">
        <?php if($unread): ?>
            <button wire:click.prevent="markAsRead" title="<?php echo e(__('Пометить прочитанным')); ?>" class="btn btn-sm btn-icon btn-light-<?php echo e($type); ?>">
                <i class="la la-check"></i>
            </button>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH D:\openserver\OpenServer\domains\prof\www\resources\views/livewire/user/notification.blade.php ENDPATH**/ ?>