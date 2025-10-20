<div class="my-3 <?php echo e($classes); ?>">
    <div class="row no-gutters align-items-center">
        <label class="col-9 col-form-label cursor-pointer <?php if($value): ?> text-success <?php endif; ?>" for="<?php echo e($id); ?>"><?php echo e($label); ?></label>
        <div class="col-3 d-flex justify-content-end">
            <span class="switch switch-sm switch-success">
                <label>
                    <input type="checkbox" <?php if($value == 'on'): ?> checked <?php endif; ?> id="<?php echo e($id); ?>" name="<?php echo e($name); ?>">
                    <span></span>
                </label>
            </span>
        </div>
    </div>
</div>
<?php /**PATH D:\openserver\OpenServer\domains\prof\www\resources\views/components/tables/filter-inputs/switch-input.blade.php ENDPATH**/ ?>