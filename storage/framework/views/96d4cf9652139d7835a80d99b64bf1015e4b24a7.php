<div class="form-group">
    <div class="image-input image-input-outline" id="avatar-image-input">
        <div class="image-input-wrapper" id="avatar-image-input-wrapper"></div>

        <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
               data-action="change" data-toggle="tooltip" title=""
               data-original-title="<?php echo e(__('Изменить')); ?>">
            <i class="fa fa-pen icon-sm text-muted"></i>
            <input type="file" value="<?php echo e(old('avatar')); ?>" onchange="previewAvatarUpload(this)" name="avatar">
        </label>
    </div>
</div>


<?php $__env->startPush('scripts'); ?>
    <script>
        previewAvatarUpload(null);

        function previewAvatarUpload(input) {
            const avatarPlaceholder = 'https://www.gravatar.com/avatar/placeholder';

            if (input && input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    document.getElementById('avatar-image-input').style.backgroundImage = `url(${e.target.result})`;
                    document.getElementById('avatar-image-input-wrapper').style.backgroundImage = `url(${e.target.result})`;
                };

                reader.readAsDataURL(input.files[0]);
            } else {
                document.getElementById('avatar-image-input').style.backgroundImage = `url(${avatarPlaceholder})`;
                document.getElementById('avatar-image-input-wrapper').style.backgroundImage = `url(${avatarPlaceholder})`;
            }
        }
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/c41010/mentor.na4u.ru/www/resources/views/admin/users/_create/_avatar.blade.php ENDPATH**/ ?>