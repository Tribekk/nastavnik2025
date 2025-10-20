<div class="footer bg-white py-4 d-flex flex-lg-column" id="kt_footer">

    <div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-end">

        <div class="text-dark order-2 order-md-1">
            <span class="font-weight-bold mr-2"><?php echo e(date('Y')); ?> ©</span>

            <a href="#" target="_blank" class="text-dark-75 text-hover-primary">
                ПРОФТРЕКЕР
            </a>
        </div>

        <div class="nav nav-dark">
            <a href="<?php echo e(url('политика_конфиденциальности.pdf')); ?>" target="_blank" class="nav-link pl-0 pr-5">Политика конфиденциальности</a>
        </div>

    </div>

    <?php if(env('APP_ENV') == 'local' || env('APP_ENV') == 'testing'): ?>
        <div class="container-fluid d-flex align-items-center justify-content-end pt-2">
            <?php echo e(shell_exec("git log -1 --pretty=format:'%h - (%ci)'")); ?>

        </div>
    <?php endif; ?>

    <div class="container-fluid d-lg-flex align-items-center justify-content-end pt-2 d-none">
        
    </div>
</div>
<?php /**PATH D:\openserver\OpenServer\domains\prof\www\resources\views/layout/partials/_footer.blade.php ENDPATH**/ ?>