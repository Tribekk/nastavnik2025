<div class="my-3 <?php echo e($classes); ?>">
    <label for="<?php echo e($id); ?>" class="mb-3 <?php if($value): ?> text-success <?php endif; ?>"><?php echo e($label); ?></label>

    <?php if($icon): ?>
        <div class="input-icon">
    <?php endif; ?>
        <input type="<?php echo e($type); ?>"
               id="<?php echo e($id); ?>"
               name="<?php echo e($name); ?>"
               class="form-control form-control-solid"
               <?php if($placeholder): ?> placeholder="<?php echo e($placeholder); ?>" <?php endif; ?>
               <?php if($model): ?> wire:model="<?php echo e($name); ?>" <?php endif; ?>
               value="<?php echo e($value); ?>">
    <?php if($icon): ?>
            <span>
                <i class="<?php echo e($icon); ?> text-muted"></i>
            </span>
        </div>
    <?php endif; ?>
</div>

<?php $__env->startPush('scripts'); ?>
    <?php if($type == "date"): ?>
        <script>
            $(document).ready(function() {
                var arrows;
                if (KTUtil.isRTL()) {
                    arrows = {
                        leftArrow: '<i class="la la-angle-right"></i>',
                        rightArrow: '<i class="la la-angle-left"></i>'
                    }
                } else {
                    arrows = {
                        leftArrow: '<i class="la la-angle-left"></i>',
                        rightArrow: '<i class="la la-angle-right"></i>'
                    }
                }

                $('#<?php echo e($id); ?>').datepicker({
                    language: 'ru',
                    rtl: false,
                    todayHighlight: true,
                    orientation: "bottom left",
                    templates: arrows,
                    clearBtn: true,
                    format: 'yyyy-mm-dd',
                }).on('changeDate', function(e) {
                    $('#<?php echo e($id); ?>').datepicker('hide');
                });
            });
        </script>
    <?php endif; ?>

    <?php if($type == "datetime-local"): ?>
        <script>
            $(document).ready(function() {
                var arrows;
                if (KTUtil.isRTL()) {
                    arrows = {
                        leftArrow: '<i class="la la-angle-right"></i>',
                        rightArrow: '<i class="la la-angle-left"></i>'
                    }
                } else {
                    arrows = {
                        leftArrow: '<i class="la la-angle-left"></i>',
                        rightArrow: '<i class="la la-angle-right"></i>'
                    }
                }

                $('#<?php echo e($id); ?>').datetimepicker({
                    language: 'ru',
                    rtl: false,
                    todayHighlight: true,
                    orientation: "bottom left",
                    templates: arrows,
                    clearBtn: true,
                    format: "yyyy-mm-ddThh:ii",
                }).on('changeDate', function(e) {
                    $('#<?php echo e($id); ?>').datetimepicker('hide');
                });
            });
        </script>
    <?php endif; ?>

    <?php if($type == "date" || $type == "datetime-local"): ?>
        <script>
            $(document).ready(function () {
                $('#<?php echo e($id); ?>').keydown(e => {
                    if (e.keyCode === 10 || e.keyCode === 13 || e.keyCode === 32) {
                        e.stopPropagation();
                        e.preventDefault();
                        return false;
                    }
                });
            })
        </script>
    <?php endif; ?>
<?php $__env->stopPush(); ?>
<?php /**PATH D:\openserver\OpenServer\domains\prof\www\resources\views/components/tables/filter-inputs/input.blade.php ENDPATH**/ ?>