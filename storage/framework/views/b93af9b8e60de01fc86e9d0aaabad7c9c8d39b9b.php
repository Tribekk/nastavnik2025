<label class="checkbox font-size-sm-h4 font-size-lg d-flex my-2 align-items-center <?php echo e($type); ?>" for="<?php echo e($id); ?>">
    <input type="checkbox" id="<?php echo e($id); ?>" name="<?php echo e($name); ?>" value="<?php echo e($value); ?>" <?php if($model): ?> wire:model.live="<?php echo e($model); ?>" <?php endif; ?> />
    <span class="mr-4 min-w-20px w-20px h-20px min-h-20px"></span>
    <?php echo e($label); ?>

</label>
<?php /**PATH D:\openserver\OpenServer\domains\prof\www\resources\views/components/inputs/checkbox.blade.php ENDPATH**/ ?>