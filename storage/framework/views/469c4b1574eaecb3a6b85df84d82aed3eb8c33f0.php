<div class="row align-items-center mb-4">
    <div class="col-md-7 order-1 order-md-0">
        <div class="progress">
            <div class="progress-bar progress-green" role="progressbar" style="width: <?php echo e($percentageParent); ?>%"></div>
            <div class="progress-bar progress-light-green" role="progressbar" style="width: <?php echo e($percentageChild); ?>%"></div>
        </div>
    </div>
    <div class="col-md-5">
        <?php if(isset($href)): ?>
            <a href="<?php echo e($href); ?>" class="link">
        <?php endif; ?>

            <span class="font-size-lg"><?php echo e($title); ?></span>
            <span class="font-weight-bold">(родители: <?php echo e($valueParent); ?> / <?php echo e($percentageParent); ?>%, дети: <?php echo e($valueChild); ?> / <?php echo e($percentageChild); ?>%)</span>

        <?php if(isset($href)): ?>
            </a>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH D:\openserver\OpenServer\domains\prof\www\resources\views/employer/_dashboard/_consultation-progress-bar.blade.php ENDPATH**/ ?>