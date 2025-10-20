<div class="row align-items-center mb-4">
    <div class="col-md-7 order-1 order-md-0">
        <div class="progress">
            <div class="progress-bar <?php echo e($color); ?>" role="progressbar" style="width: <?php echo e($percentage); ?>%"></div>
        </div>
    </div>
    <div class="col-md-5">
        <?php if(isset($href)): ?>
            <a href="<?php echo e($href); ?>" class="link">
        <?php endif; ?>

            <span class="font-size-lg"><?php echo e($title); ?></span>
            <span class="font-weight-bold">(<?php echo e($value); ?> / <?php echo e($percentage); ?>%)</span>

        <?php if(isset($href)): ?>
            </a>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH D:\openserver\OpenServer\domains\prof\www\resources\views/employer/_dashboard/progress-bar.blade.php ENDPATH**/ ?>