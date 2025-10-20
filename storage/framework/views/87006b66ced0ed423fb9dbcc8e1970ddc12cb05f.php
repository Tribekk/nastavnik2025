<div class="card card-custom <?php echo e($classes); ?>">
    <div class="card-header flex-wrap border-0 pt-6 pb-0">
        <?php if(!isset($cardTitle)): ?>
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label font-weight-bolder text-dark"><?php echo e($title); ?></span>
            </h3>
        <?php else: ?>
            <?php echo e($cardTitle); ?>

        <?php endif; ?>

        <?php if(isset($toolbar)): ?>
            <div class="card-toolbar">
                <?php echo e($toolbar); ?>

            </div>
        <?php endif; ?>
    </div>
    <div class="card-body">
        <?php echo e($slot); ?>

    </div>
</div>
<?php /**PATH D:\openserver\OpenServer\domains\prof\www\resources\views/components/card.blade.php ENDPATH**/ ?>