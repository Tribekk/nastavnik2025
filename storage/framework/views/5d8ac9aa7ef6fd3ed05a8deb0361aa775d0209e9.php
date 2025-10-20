<div class="form-group">
    <?php if($title): ?>
        <label for="<?php echo e($id); ?>" class="font-size-h6 font-weight-bolder text-dark <?php if($required): ?> required <?php endif; ?>"><?php echo e($title); ?></label>
    <?php endif; ?>

    <?php if($prependIcon): ?>
        <div class="input-group input-group-lg input-group-solid">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="<?php echo e($prependIcon); ?>"></i>
                </span>
            </div>
    <?php endif; ?>
        <input id="<?php echo e($id); ?>"
               type="<?php echo e($type); ?>"
               class="form-control form-control-solid h-auto py-4 px-6 rounded-lg <?php $__errorArgs = [strArrToPath($name)];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <?php $__errorArgs = [strArrToPath($name)."*"];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
               <?php if($model && !($datePicker || $dateTimePicker)): ?> wire:model.defer="<?php echo e($model); ?>" <?php endif; ?>
               name="<?php echo e($name); ?>"
               <?php if($multiple): ?> multiple <?php endif; ?>
               <?php if($readonly): ?> readonly <?php endif; ?>

               <?php if($placeholder): ?> placeholder="<?php echo e($placeholder); ?>" <?php endif; ?>
               <?php if($min): ?> min="<?php echo e($min); ?>" <?php endif; ?>
               <?php if($step): ?> step="<?php echo e($step); ?>" <?php endif; ?>
               <?php if(old($name)): ?>
                   value="<?php echo e(old($name)); ?>"
               <?php else: ?>
                   value="<?php echo $value; ?>"
               <?php endif; ?>
               <?php if($accept): ?> accept="<?php echo e($accept); ?>" <?php endif; ?>
        >

    <?php if($prependIcon): ?>
        </div>
    <?php endif; ?>

    <?php if(!$errors->has(strArrToPath($name)) && $multiple): ?>
        <?php $__errorArgs = [strArrToPath($name).'.*'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="invalid-feedback" role="alert" style="display: block;">
                <strong><?php echo e($message); ?></strong>
            </span>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    <?php endif; ?>

    <?php $__errorArgs = [strArrToPath($name)];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <span class="invalid-feedback" role="alert" style="display: block;">
            <strong><?php echo e($message); ?></strong>
        </span>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</div>


<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function() {
            <?php if($datePicker || $dateTimePicker): ?>
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
            <?php endif; ?>

            <?php if($datePicker): ?>
                // minimum setup
                $('#<?php echo e($id); ?>').datepicker({
                    language: 'ru',
                    rtl: false,
                    todayHighlight: true,
                    orientation: "bottom left",
                    templates: arrows,
                    clearBtn: true,
                    format: "dd.mm.yyyy",
                }).on('changeDate', function (e) {
                    $('#<?php echo e($id); ?>').datepicker('hide');
                });
            <?php endif; ?>

            <?php if($dateTimePicker): ?>
                // minimum setup
                $('#<?php echo e($id); ?>').datetimepicker({
                    language: 'ru',
                    rtl: false,
                    todayHighlight: true,
                    orientation: "bottom left",
                    templates: arrows,
                    clearBtn: true,
                    format: "yyyy-mm-ddThh:ii",
                }).on('changeDate', function (e) {
                    $('#<?php echo e($id); ?>').datetimepicker('hide');
                });
            <?php endif; ?>

            <?php if($datePicker || $dateTimePicker): ?>
                <?php if($model): ?>
                    $('#<?php echo e($id); ?>').change(e => window.livewire.find('<?php echo e($_instance->id); ?>').set('<?php echo e($model); ?>', e.target.value));
                <?php endif; ?>

                $('#<?php echo e($id); ?>').keydown(e => {
                    //if (e.keyCode === 10 || e.keyCode === 13 || e.keyCode === 32) {
                    //    e.stopPropagation();
                    //    e.preventDefault();
                    //    return false;
                    //}
                });
            <?php endif; ?>
        });
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH D:\openserver\OpenServer\domains\prof\www\resources\views/components/inputs/input-text-v.blade.php ENDPATH**/ ?>