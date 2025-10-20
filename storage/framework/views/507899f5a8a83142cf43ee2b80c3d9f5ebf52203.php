<?php if($errors->any()): ?>


    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert" area-label="close">
                    <span area-hidden="true"></span>
                </button>
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $errorTxt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li> <?php echo e($errorTxt); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        </div>
    </div>


<?php endif; ?>



<?php if(session('success')): ?>

    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" area-label="close">
                    <span area-hidden="true"></span>
                </button>
                <?php echo e(session()->get('success')); ?>

            </div>
        </div>
    </div>

<?php endif; ?><?php /**PATH /home/c41010/mentor.na4u.ru/www/resources/views/admin/user_profiles/include/result_messages.blade.php ENDPATH**/ ?>