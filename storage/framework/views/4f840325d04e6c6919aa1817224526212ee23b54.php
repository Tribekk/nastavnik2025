<div class="row align-items-center my-2">
    <div class="col-lg-10 row">
        <div class="col-md-3 col-6 d-flex justify-content-md-end align-items-center order-0 mb-md-0 mb-4">
            <div class="font-size-h6 text-dark-75"><?php echo e($leftLabel); ?></div>
        </div>
        <div class="col-md-6 order-md-1 order-2">
            <div class="ion-range-slider <?php echo e($sliderClass ?? ""); ?>">
                <input type="hidden" id="<?php echo e($sliderId); ?>" name="<?php echo e($sliderName); ?>"/>
            </div>
        </div>
        <div class="col-md-3 col-6 justify-content-md-start justify-content-end d-flex align-items-center order-md-2 order-1 mb-md-0 mb-4">
            <div class="font-size-h6 text-dark-75"><?php echo e($rightLabel); ?></div>
        </div>
    </div>
</div>

<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function() {
            $('#<?php echo e($sliderId); ?>').ionRangeSlider({
                min: 0,
                max: 10,
                from: <?php echo e($value); ?>,
                grid: true,
                grid_num: 10,
            });
        });
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/c41010/mentor.na4u.ru/www/resources/views/feedback/_slider-input.blade.php ENDPATH**/ ?>