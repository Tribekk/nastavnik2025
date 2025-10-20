<?php $__env->startPush('css'); ?>
    <style type="text/css">
        .st0{fill:#5C6670;}
    </style>
<?php $__env->stopPush(); ?>

<div class="col-xl-12">
    <div class="card card-custom gutter-b">
        <div class="card-body">
            <?php echo $__env->make('home._widgets.attach-role._form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


            <div class="mt-8 text-right">
                <a href="<?php echo e(route('attach.consultant')); ?>" class="font-hero font-brown-light link font-size-h5 mx-4">Консультант</a>
                <a href="<?php echo e(route('attach.employer')); ?>" class="font-hero font-brown-light link font-size-h5 mx-4">Работодатель</a>
            </div>
        </div>
    </div>
</div>
<?php /**PATH D:\openserver\OpenServer\domains\prof\www\resources\views/home/_widgets/_attach-role.blade.php ENDPATH**/ ?>