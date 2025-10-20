<div id="kt_quick_user" class="offcanvas offcanvas-right p-10">

    <div class="offcanvas-header d-flex align-items-center justify-content-between pb-5">
        <h3 class="font-weight-bold m-0">
            <?php echo e(__('Мой профиль')); ?>

        </h3>
        <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_user_close">
            <i class="ki ki-close icon-xs text-muted"></i>
        </a>

    </div>

    <div class="offcanvas-content pr-5 mr-n5">
        <?php echo $__env->make('layout.partials._extras.offcanvas._quick-user._info', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="separator separator-dashed mt-8 mb-5"></div>

        <?php echo $__env->make('layout.partials._extras.offcanvas._quick-user._navi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="separator separator-dashed my-7"></div>

        <?php echo $__env->make('layout.partials._extras.offcanvas._quick-user._notifications', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</div>
<?php /**PATH D:\openserver\OpenServer\domains\prof\www\resources\views/layout/partials/_extras/offcanvas/quick-user.blade.php ENDPATH**/ ?>