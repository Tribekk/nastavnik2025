<div class="form-group">
    <?php if($title): ?>
        <label for="<?php echo e($id); ?>" class="font-size-h6 font-weight-bolder d-block text-dark <?php if($required): ?> required <?php endif; ?>"><?php echo e($title); ?></label>
    <?php endif; ?>

    <div class="image-input image-input-outline <?php $__errorArgs = [$name];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="image-input-<?php echo e($name); ?>">
        <div class="image-input-wrapper" id="image-input-<?php echo e($name); ?>-wrapper"></div>

        <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
               data-action="change" data-toggle="tooltip" title=""
               data-original-title="<?php echo e(__('Изменить')); ?>">
            <i class="fa fa-pen icon-sm text-muted"></i>
            <input type="file" <?php if($model): ?> wire:model.defer="<?php echo e($model); ?>" <?php endif; ?> id="<?php echo e($id); ?>" name="<?php echo e($name); ?>" value="<?php echo e(old('avatar')); ?>">
        </label>

        <?php if($destroyAction): ?>
            <label id="<?php echo e($name); ?>-destroy" class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                    data-action="remove"
                    data-toggle="tooltip"
                    data-original-title="<?php echo e(__('Удалить')); ?>">
                <i class="ki ki-bold-close icon-xs text-muted"></i>
            </label>
        <?php endif; ?>

    </div>

    <?php $__errorArgs = [$name];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <span class="invalid-feedback font-size-sm">
            <strong><?php echo e($message); ?></strong>
        </span>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</div>


<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function () {
            let placeholder = '<?php echo e($placeholder); ?>';

            previewUploadFile(null, 'image-input-<?php echo e($name); ?>', 'image-input-<?php echo e($name); ?>-wrapper');

            function previewUploadFile(input, inputId, wrapperId) {

                if (input && input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        document.getElementById(inputId).style.backgroundImage = `url(${e.target.result})`;
                        document.getElementById(wrapperId).style.backgroundImage = `url(${e.target.result})`;
                    };

                    reader.readAsDataURL(input.files[0]);
                    $("#<?php echo e($name); ?>-destroy").hide();
                } else {
                    document.getElementById(inputId).style.backgroundImage = `url(${placeholder})`;
                    document.getElementById(wrapperId).style.backgroundImage = `url(${placeholder})`;
                    $("#<?php echo e($name); ?>-destroy").show();
                }
            }

            $('#<?php echo e($id); ?>').change(function() {
                previewUploadFile(this, 'image-input-<?php echo e($name); ?>', 'image-input-<?php echo e($name); ?>-wrapper')
            });

            <?php if($destroyAction): ?>
                $('#<?php echo e($name); ?>-destroy').click(function () {
                    $.post('<?php echo e($destroyAction); ?>', {_method: "delete", _token: "<?php echo e(csrf_token()); ?>"})
                        .then(function (response) {
                            toastr['success'](response);
                            placeholder = '<?php echo e($destroyPlaceholder); ?>';
                            previewUploadFile(null, 'image-input-<?php echo e($name); ?>', 'image-input-<?php echo e($name); ?>-wrapper');
                            $('#<?php echo e($name); ?>-destroy').remove();
                        });
                });
            <?php endif; ?>
        });
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/c41010/mentor.na4u.ru/www/resources/views/components/inputs/image.blade.php ENDPATH**/ ?>