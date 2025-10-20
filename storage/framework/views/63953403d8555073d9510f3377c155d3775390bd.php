<div class="alert alert-custom alert-<?php echo e($type); ?> d-inline-flex fade show mb-5" role="alert">
    <?php if($icon): ?>
    <div class="alert-icon"><i class="<?php echo e($icon); ?>"></i></div>
    <?php endif; ?>
    <div class="alert-text"><?php echo $text; ?></div>
    <?php if($close): ?>
    <div class="alert-close">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"><i class="ki ki-close"></i></span>
        </button>
    </div>
    <?php endif; ?>
</div>
<?php /**PATH D:\openserver\OpenServer\domains\prof\www\resources\views/components/alert.blade.php ENDPATH**/ ?>