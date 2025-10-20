<div class="form-group">
    <div class="row">
        <div class="col-auto">
            <div class="image-input image-input-outline" style="background-image: url(<?php echo e($user->avatarUrl); ?>)">
                <div class="image-input-wrapper" style="background-image: url(<?php echo e($user->avatarUrl); ?>)"></div>







            </div>
        </div>
        <div class="col-12 col-md-6 ml-3">
            <div class="form-group row my-2">
                <label class="col-4 col-form-label">Email:</label>
                <div class="col-8">
                    <span class="form-control-plaintext font-weight-bolder">
                        <?php if($user->email): ?>
                            <a href="mailto:<?php echo e($user->email); ?>"><?php echo e($user->email); ?></a>
                            <?php if (! ($user->email_verified_at)): ?>
                                <span class="d-block font-size-sm text-muted"><?php echo e(__('не подтвержден')); ?></span>
                            <?php endif; ?>
                        <?php else: ?>
                             <span class="text-muted">Не указан</span>
                        <?php endif; ?>
                    </span>
                </div>
            </div>
            <div class="form-group row my-2">
                <label class="col-4 col-form-label">Телефон:</label>
                <div class="col-8">
                    <span class="form-control-plaintext font-weight-bolder">
                        <a href="tel:<?php echo e(unFormatPhone($user->phone)); ?>" class="text-muted text-hover-primary" id="phone">
                           <?php echo e(str_replace('+7', '', $user->phone)); ?>

                        </a>
                        <?php if (! ($user->phone_verified_at)): ?>
                            <span class="d-block font-size-sm text-muted"><?php echo e(__('не подтвержден')); ?></span>
                        <?php endif; ?>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function() {
            $("#phone").inputmask("+7 (999) 999 99 99");
        })
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH D:\openserver\OpenServer\domains\prof\www\resources\views/admin/users/_edit/_avatar.blade.php ENDPATH**/ ?>