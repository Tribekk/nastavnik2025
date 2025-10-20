<div class="d-flex align-items-center mt-5">
    <div class="symbol symbol-100 mr-5">
        <div class="symbol-label" style="background-image:url(<?php echo e(Auth::user()->avatarUrl); ?>)"></div>
        <i class="symbol-badge bg-success"></i>
    </div>
    <div class="d-flex flex-column">
        <a href="<?php echo e(route('user.edit')); ?>"
           class="font-weight-bold font-size-h5 text-dark-75 text-hover-primary"><?php echo e(Auth::user()->name); ?>

        </a>
        <div class="text-muted mt-1"><?php echo e(Auth::user()->typeAsString); ?></div>
        <div class="navi mt-2">
            <?php if(Auth::user()->email): ?>
                <a href="mailto:<?php echo e(Auth::user()->email); ?>" class="navi-item">
                        <span class="navi-link p-0 pb-2">
                            <span class="navi-icon mr-1">
                                <span class="svg-icon svg-icon-lg svg-icon-primary">
                                    <i class="la la-envelope"></i>
                                </span>
                            </span>
                            <span class="navi-text text-muted text-hover-primary"><?php echo e(Auth::user()->email); ?></span>
                        </span>
                </a>
            <?php endif; ?>
            <a href="<?php echo e(route('logout')); ?>" class="btn btn-sm btn-light-primary font-weight-bolder py-2 px-5"><?php echo e(__('Выход')); ?></a>
        </div>
    </div>
</div>
<?php /**PATH D:\openserver\OpenServer\domains\prof\www\resources\views/layout/partials/_extras/offcanvas/_quick-user/_info.blade.php ENDPATH**/ ?>