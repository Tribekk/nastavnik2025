<div class="subheader py-2 py-lg-6 subheader-solid  d-md-block">

    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap subhead__progress-container">

        <?php if($title): ?>
            <div class="wrap-logo d-inline-flex align-content-center mr-5">
                <div class="mainLogo">
                    <img src="../../img/bootLogo1.png" alt="">
                </div>
                <div class="mainLogo">
                    <img src="../../img/bootLogo2.png" alt="">
                </div>
                <div class="mainLogo">
                    <img src="../../img/bootLogo3.png" alt="">
                </div>

            </div>
            <div class="font-pixel font-brown-light font-weight-black font-size-h1 bg-white <?php if (! ($withProgress)): ?> flex-grow-1 <?php endif; ?>">
               <a href="/" style="color: #2d38fc;text-transform: uppercase;font-weight: normal;font-size: 25px;"> <img src="https://lk.proftreker.ru/img/blueLogo.png" class="max-h-40px" alt=""> Наставничество</a>
            </div>
        <?php endif; ?>

        <?php if($withProgress): ?>
                <div class="wrap-logo d-inline-flex align-content-center">
                    <div class="mainLogo">
                        <img src="../../img/bootLogo1.png" alt="">
                    </div>
                    <div class="mainLogo">
                        <img src="../../img/bootLogo2.png" alt="">
                    </div>
                    <div class="mainLogo">
                        <img src="../../img/bootLogo3.png" alt="">
                    </div>
                    
                </div>






        <?php endif; ?>
    </div>
</div>

<?php $__env->startPush('css'); ?>
    <style>
        .topbar-mobile-on .topbar {
            z-index: 2;
        }

        .subhead__progress-container {
            position: relative;
        }

        .subhead__progress-background {
            height: 35px;
        }

        .subhead__progress-rocket {
            height: 40px;
            position: absolute;
            z-index: 1;
            left: calc(<?php echo e($margin); ?>% - 35px);
            top: 50%;
            transform: translate(calc(-<?php echo e($margin); ?>% - 35px), -50%);
        }

        .subhead__progress-lamp {
            height: 60px;
        }

        @media  only screen and (max-width: 768px) {
            .subhead__progress-background {
                height: 35px;
            }

            .subhead__progress-rocket {
                height: 25px;
                left: calc(<?php echo e($margin); ?>% - 23px);
                transform: translate(calc(-<?php echo e($margin); ?>% - 23px), -50%);
            }

            .subhead__progress-lamp {
                height: 40px;
            }
        }
    </style>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/c41010/mentor.na4u.ru/www/resources/views/components/subheader.blade.php ENDPATH**/ ?>