<div class="card card-custom">

    <div class="card-header card-header-tabs-line nav-tabs-line-3x">
        <div class="card-toolbar">
            <ul class="nav nav-tabs nav-bold nav-tabs-line nav-tabs-line-3x">
                <?php echo $__env->make('user.profile._nav-items', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </ul>
        </div>
    </div>

    <div class="card-body px-0">
        <div class="tab-content">
            <?php echo $__env->make('user.profile._user-tab', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('user.profile._security-tab', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('user.profile._notifications-tab', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('user.profile._tmp-sms-tab', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>

</div>
<?php /**PATH /home/c109133/nastavnik2025.na4u.ru/www/resources/views/user/profile/_card.blade.php ENDPATH**/ ?>