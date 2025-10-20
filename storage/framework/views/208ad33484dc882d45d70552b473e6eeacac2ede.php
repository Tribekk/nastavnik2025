<!DOCTYPE html>

<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <?php echo $__env->make('layout.partials._head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body id="kt_body"
      class="header-fixed header-mobile-fixed subheader-enabled aside-enabled aside-fixed aside-minimize-hoverable page-loading">
<div class="d-flex flex-column flex-root">
    <div class="login login-1 login-signin-on d-flex flex-column flex-column-fluid bg-white" id="kt_login">
        
        <img class="bgImg" src="../../img/bootBg.png" alt="">
        <div class="login-aside d-flex flex-column flex-row-auto">
            <div class="wrapLogo d-flex mx-auto flex-column-auto flex-column pt-lg-40 pt-15 text-center ">
                <a href="<?php echo e(url('/')); ?>" class="text-center mainLogo">
                    <img src="<?php echo e(asset('img/blueLogo.png')); ?>" class="max-h-70px" alt=""/>
                </a>
                <h1 class="font-pixel text-uppercase text-center text-white d-none" class="font-pixel text-uppercase text-center text-white">Профтрекер</h1>
            </div>
            
        </div>
        <div
            class="login-content flex-row-fluid d-flex flex-column justify-content-center position-relative overflow-hidden p-7 mx-auto w-100">
            <div class="d-flex flex-column-fluid flex-center">
                <?php echo $__env->yieldContent('content'); ?>
            </div>
            
            
            
            
            
        </div>
    </div>
</div>

<?php echo $__env->make('layout.partials.kt-settings', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!--begin::Global Theme Bundle(used by all pages)-->
<script src="<?php echo e(asset('plugins/global/plugins.bundle.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/custom/prismjs/prismjs.bundle.js')); ?>"></script>
<script src="<?php echo e(asset('js/scripts.bundle.js')); ?>"></script>
<!--end::Global Theme Bundle-->
<script src="<?php echo e(asset('js/pages/crud/forms/widgets/input-mask.js')); ?>"></script>

<?php echo \Livewire\Livewire::scripts(); ?>

<?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH D:\openserver\OpenServer\domains\prof\www\resources\views/layout/auth.blade.php ENDPATH**/ ?>